<?php
date_default_timezone_set('Europe/Madrid');
$todayDate = date('Y-m-d H:i:s');
$releaseDate = date("Y-m-d H:i:s", strtotime('2023-06-29 12:00:00'));
if ($todayDate < $releaseDate) { ?>


    <div class="row d-flex flex-column px-0 question bg-light g--shadow-question">
        <div class="col-12 my-4 pt-3"><h3 class="text-center g--question-title-style"><?=$lang["questionCard"]["title"]?></h3></div>
        <div class="col-12 "><img src="assets/img/Animales.png" class="d-block mx-auto g--shadow-img" alt="" style="width: 80%;"></div>
        <div class="col-12">
            <p class="question__p mt-4"><?=$lang["questionCard"]["question"]?></p>
            <!-- <form action="" method="post"> -->
            <input type="radio" class="radio"id="elephant" name="question__radio" value="elephant">
            <label for="elephant" class="label"><?=$lang["questionCard"]["option1"]?></label><br>
            <input type="radio" class="radio" id="whale" name="question__radio" value="whale">
            <label for="whale"class="label"><?=$lang["questionCard"]["option2"]?></label><br>
            <input type="radio" class="radio" id="zebra" name="question__radio" value="zebra">
            <label for="zebra"class="label"><?=$lang["questionCard"]["option3"]?></label><br>
            <input type="radio" class="radio" id="giraffe" name="question__radio" value="giraffe">
            <label for="giraffe" class="label"><?=$lang["questionCard"]["option4"]?></label><br>
            <input type="radio" class="radio" id="correctAnswer" name="question__radio" value="hippo">
            <label for="correctAnswer" class="label"><?=$lang["questionCard"]["option5"]?></label><br>
            <!-- <input id="enviarRespuesta"class="d-block mx-auto g--btn-red px-5 py-2 g--bg-red text-white my-4" type="submit" value="Send" name="enviar" class="mt-5 d-block border-0 mx-auto bg-primary text-white py-2 px-5"> -->
            <input disabled id="enviarRespuesta"class="d-block mx-auto g--btn-red px-5 py-2 g--bg-red text-white my-4" type="submit" value="Send" name="enviar" class="mt-5 d-block border-0 mx-auto bg-primary text-white py-2 px-5">
            <!-- </form> -->
        </div>
    </div>
    <div class="d-none"id="cookieQuestionCard"><?php echo $_SESSION['questionCard'] ?></div>


<?php } else { ?>


    <div class="row d-flex flex-column px-0 question bg-light g--shadow-question">
        <div class="col-12 my-4 pt-3"><h3 class="text-center g--question-title-style"><?=$lang["questionCard"]["title"]?></h3></div>
        <div class="col-12 "><img src="assets/img/AnimalesGuerraAustralia2.png" class="d-block mx-auto g--shadow-img" alt="" style="width: 80%;"></div>
        <div class="col-12">
            <p class="question__p mt-4"><?=$lang["questionCard2"]["question"]?></p>
            <!-- <form action="" method="post"> -->
            <input type="radio" class="radio"id="cat" name="question__radio" value="elephant">
            <label for="cat" class="label" ><?=$lang["questionCard2"]["option1"]?></label><br>
            <input type="radio" class="radio" id="correctAnswer" name="question__radio" value="yo">
            <label for="correctAnswer"class="label"><?=$lang["questionCard2"]["option2"]?></label><br>
            <input type="radio" class="radio" id="spider" name="question__radio" value="zebra">
            <label for="spider"class="label"><?=$lang["questionCard2"]["option3"]?></label><br>
            <input type="radio" class="radio" id="kangaroo" name="question__radio" value="giraffe">
            <label for="kangaroo" class="label"><?=$lang["questionCard2"]["option4"]?></label><br>
            <input type="radio" class="radio" id="noneA" name="question__radio" value="hippo">
            <label for="noneA" class="label"><?=$lang["questionCard2"]["option5"]?></label><br>
            <!-- <input id="enviarRespuesta"class="d-block mx-auto g--btn-red px-5 py-2 g--bg-red text-white my-4" type="submit" value="Send" name="enviar" class="mt-5 d-block border-0 mx-auto bg-primary text-white py-2 px-5"> -->
            <input disabled id="enviarRespuesta"class="d-block mx-auto g--btn-red px-5 py-2 g--bg-red text-white my-4" type="submit" value="Send" name="enviar" class="mt-5 d-block border-0 mx-auto bg-primary text-white py-2 px-5">
            <!-- </form> -->
        </div>
    </div>
    <div class="d-none"id="cookieQuestionCard"><?php echo $_SESSION['questionCard'] ?></div>
    
    
<?php } ?>




























<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let cookie=document.getElementById("cookieQuestionCard").innerHTML;
    let btn=document.getElementById("enviarRespuesta");
    btn.addEventListener("click",comprueba);
    if(cookie=="true"){
        btn.disabled = false;
    }
    
    

    function comprueba(){
        if (document.getElementById("correctAnswer").checked){
            correct();
            btn.disabled = true;
            // document.cookie = "cookieQuestionCard=False";
        }else{
            incorrect();
            btn.disabled = true;
            // document.cookie = "cookieQuestionCard=False";
        }
    }






    // document.getElementById("enviarRespuesta").addEventListener("click",alerttt);

    function incorrect(){
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'This is not the correct answer  :(',
        confirmButtonColor: '#3085d6',
        confirmButtonText: "OK :'("
        }).then((result) => {
        if (result.isConfirmed) {
            location = "index.php?ctl=desactivarQuestion"
        }
        })  
    }
    function correct(){
        Swal.fire({
        title: 'Congratulations!',
        text: 'You clicked the right option!',
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Great!'
        }).then((result) => {
        if (result.isConfirmed) {
            location = "index.php?ctl=insertarPuntos"
        }
        })        
    }
</script>

<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

