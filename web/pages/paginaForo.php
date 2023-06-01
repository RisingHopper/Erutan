<?php 
ob_start();
$pageTittle="Foro - The erutan";
?>








<div class="container-fluid">



    <!-- inicio -->


    
    <div class="row">
    <div class="col-md-7 col-12 my-5">
      <div class="col-12 mb-5 ps-5">
      <h2 class="text-center fw-bold text-uppercase">Chat with the erutan'user</h2>
      </div>
      
      <div class="col-md-10 col-12 mb-5 px-md-5 px-1">
      
      <form method="POST" id="comment_form">
        <div class="form-group">
        <input type="text" name="comment_name" id="comment_name" class="form-control d-none rounded-0" value="<?php echo $_SESSION['idUser']?>" />
        <input type="text" name="comment_nam" id="comment_nam" class="form-control mb-2 rounded-0 g--border-black" value=<?php echo $_SESSION['nombreUsuario']?> disabled />
        </div>
        <div class="form-group">
        <textarea name="comment_content" id="comment_content" class="form-control mb-2 rounded-0 g--border-black" placeholder="Enter Comment" rows="5"></textarea>
        </div>
        <div class="form-group">
        <input type="hidden" name="comment_id" id="comment_id" value="0" />
        <input type="submit" name="submit" id="submit" class="px-5 py-1 bg-black text-white g--font-size-22 fw-semibold" value="Submit" />
        </div>
      </form>
      </div>


        <span id="comment_message"></span>
        <br />
        <div class="col-12 px-md-5 px-1">
        <div id="display_comment" class="bg-white p-md-5 p-3 g--border-black"></div>
        </div>



    </div>
    <div class="d-none d-md-block col-5 g--bg-community">
      .
    </div>
    </div>












    








    <!-- fin -->

</div>


<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"pages/add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"pages/fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});







// Ckeditor

    // ClassicEditor
    //     .create( document.querySelector( '#comment_content' ) )
    //     .catch( error => {
    //     console.error( error );
    //     } );







</script>
	
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>
