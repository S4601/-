</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/05d1c1c8a8.js" crossorigin="anonymous"></script>
<footer class="footer static-bottom">
    <div class="d-flex py-5 justify-content-between">
        <div class="ForUs mx-auto">            
            <p class="h2"><a href="<?php echo $_POST['menuLinks'];?>index.php" class="navbar-brand text-white logoFooter lead mx-auto px-2">A&G</a></p>
        </div>
        <div class="mx-auto">
            <p class=""></p>
        </div>
    </div>
</footer>


<div class="chatBotWrapper collapse"  id="chatBotToggler">
    <div class="title">Чат бот</div>
    <div class="form">
        <div class="bot-inbox inbox">
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="msg-header">
                <p>Здравейте! Как мога да Ви помогна?</p>
            </div>
        </div>
    </div>
    <div class="typing-field">
        <div class="input-data d-flex">
            <input class="form-control px-3" id="data" type="text" placeholder="Какъв е вашият проблем?" required>
            <button id="send-btn" class="btn form-control px-0">Изпращане</button>
        </div>
    </div>
</div>


<button class="navbar-toggler chatBotButton rounded-circle d-flex align-items-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chatBotToggler" aria-expanded="false">
    <i class="fas fa-user h2 text-white mx-auto " aria-hidden="true"></i>
</button>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'chatBot/message.php',
                    type: 'GET',
                    data: {'text': $value},
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>

</body>
</html>