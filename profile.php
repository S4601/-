<?php
    include_once 'header.php';
    
    if(!isset($_SESSION['useruid'])) {
        header("Location: index.php");
        exit();
    }
?>

<script src="https://code.jquery.com/jquery-2.1.1.js"></script>
<script>
function getresult(url) {
	$.ajax({
		url: url,
		type: "GET",
		data:  {rowcount:$("#rowcount").val()			
		},		
		success: function(data){            
		    $("#pagination-result").html(data);	            
		},
		error: function() 
		{} 	        
   });
}
function changePagination(option) {
	if(option!= "") {
		getresult("profilePosts/getresult.php");
	}
}


changePagination("all-links");
</script>

<script>		
	function ScrollToTop() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>

<div class="p-5">
    <div class="container">
        <div class="d-lg-flex justify-content-between">
            <div class="myPosts w-lg-120">
                <div class="myPostsTitle d-flex justify-content-between pb-2">
                    <p class="lead my-auto">Моите обяви</p>
                    <a class="btn align-middle rounded-pill addPost" href="post/addPost.php">Добави обява</a>
                </div>
                
                <div class="row w-100 mx-auto page-content" id="pagination-result">
                    <!--
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 g-4">
                        <div class="card mx-auto">
                            <img src="img/logo1.jpg" class="card-img-top" alt="t">
                            <div class="card-body">
                                <h5 class="card-title">Обява</h5>
                                <div class="container">
                                    <p class="card-text"><p class="d-inline inf">Предмет: </p>Математика</p>
                                    <p class="card-text"><p class="d-inline inf">Клас: </p> 10</p>                                
                                    <p class="card-text"><p class="d-inline inf">Област: </p>Смолян</p>
                                    <p class="card-text"><p class="d-inline inf">Населено място: </p>Доспат</p>

                                    <p class="card-text text-danger text-center h2 my-3">20 лв.</p>
                                </div>                                
                                <a href="#" class="btn w-100 viewMore">Виж повече</a>
                            </div>
                        </div>
                        
                    </div>-->
                    

                    <input type="hidden" name="rowcount" id="rowcount" />
                </div>
                
            </div>

            <div class="profileData w-lg-35 w-100 mt-5 mt-lg-0">
                <div class="text-center">
                    <img src="img/AccountIcon.svg" alt="" class="w-lg-50 w-25 mt-4">
                </div>
                
                <div class="my-4 mx-5 mx-3-lg">
                    <?php
                        $sql = "SELECT * FROM users WHERE usersId = ?";
                        $stmt = mysqli_stmt_init($conn);
                        
                        if(!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../profile.php?error=stmtFailed");
                            exit();
                        }
                        
                        mysqli_stmt_bind_param($stmt, 'i', $_SESSION['userid']);
                        mysqli_stmt_execute($stmt);
                        
                        $resultData = mysqli_stmt_get_result($stmt);
                        
                        if($row = mysqli_fetch_assoc($resultData)) {
                            echo '<p class="lead">Име: '.$row["usersName"].'</p>
                            <p class="lead">Имейл: '.$row["usersEmail"].'</p>
                            <p class="lead">Потребителско име: '.$row["usersUid"].'</p>
                            <p class="lead">Телефонен номер: '.$row["phone"].'</p>';
                        }

                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getresult("getresult.php");
</script>

<?php
    include_once 'footer.php';
?>