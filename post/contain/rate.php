<?php
    session_start();
    include_once '../../includes/dbh.inc.php';
    
    $sqlInsertRate;

    $sqlIsItRated = 'SELECT * FROM rates WHERE ratedUser=? && userID = ?;';
    $stmtIsItRated = mysqli_stmt_init($conn);
    $t;
    if(!mysqli_stmt_prepare($stmtIsItRated, $sqlIsItRated)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmtIsItRated, "ii", $_GET['ratedUser'], $_SESSION['userid']);
        mysqli_stmt_execute($stmtIsItRated);
        
        $resultData = mysqli_stmt_get_result($stmtIsItRated);                
        
        if($row = mysqli_fetch_assoc($resultData)) {
            $sqlInsertRate = 'UPDATE rates SET rate = ? WHERE ratedUser=? && userID = ?;';           
        } else {
            $sqlInsertRate = 'INSERT INTO rates(rate, ratedUser, userID) VALUES(?, ?, ?);';
        }
                
    }
        
    $stmtInsertRate = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmtInsertRate, $sqlInsertRate)) {
        echo "SQL statement failed";
    } else {
        $rate = $_GET['rate'] + 1;
        mysqli_stmt_bind_param($stmtInsertRate, "iii",$rate , $_GET['ratedUser'], $_SESSION['userid']);
        mysqli_stmt_execute($stmtInsertRate);
    }
    
    $sqlAverageRate = 'SELECT rate FROM rates WHERE ratedUser=?';
    $stmtAverageRate = mysqli_stmt_init($conn);
    $avg;

    if(!mysqli_stmt_prepare($stmtAverageRate, $sqlAverageRate)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmtAverageRate, "i", $_GET['ratedUser']);
        mysqli_stmt_execute($stmtAverageRate);

        $resultData = mysqli_stmt_get_result($stmtAverageRate);
        $sum = 0;
        $count = 0;
        
        while($row = mysqli_fetch_assoc($resultData)) {
            $sum += $row['rate'];
            $count++;
        }
        
        $avg = $sum / $count;
    }

    $sqlUpdateAverageRate = 'UPDATE users SET rate = ? WHERE usersId=?;';
    $stmtUpdateAverageRate = mysqli_stmt_init($conn);
    

    if(!mysqli_stmt_prepare($stmtUpdateAverageRate, $sqlUpdateAverageRate)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($stmtUpdateAverageRate, "di", $avg, $_GET['ratedUser']);
        mysqli_stmt_execute($stmtUpdateAverageRate);        
    }

    print_r('<p class="h1 mx-auto w-25 text-center">'.$avg.'</p>');
?>