$(document).ready(function () {
    var postData = new FormData();
    postData.append('ajaxCall', "getPost");
   

    $.ajax({
        url: 'ajax/ajaxPost.php',
        type: 'POST',
        data: postData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        success: function (data) {
            $("anaId").text(String(data));
        }
    });
    
    

    $("#postForm").on("submit", function () {

        return false;
    });

    $("#createPostButton").on("click", function () {

        var fileData = new FormData();
        fileData.append('ajaxCall', "createPost");
        fileData.append('postContent', $('#postContent').val());
        fileData.append('file', $('#attachMediaPost')[0].files[0]);

        $.ajax({
            url: 'ajax/ajaxPost.php',
            type: 'POST',
            data: fileData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (data) {
                console.log(data);
                alert(data);
            }
        });

        // $.post("ajax/ajaxPost.php", {ajaxCall: "createPost", postContent: $('#postContent').val(), file: fileData}, function(data, status){
        //     alert("Data: " + data + "\nStatus: " + status);
        //   });


    });

    $.post("ajax/ajaxPost.php",{ajaxCall: "getPost"},function(data,status){
       
        parseData=jQuery.parseJSON(data);

        for(let i = 0; i <= parseData.length; i++){
            var htmlContent =   '<div class="postContent mb-2" id="'+i+'">';

            htmlContent +=          '<label>' + parseData[i]['full_name'] + '</label> <button class="editPost">Edit</button> <button class="deletePost" onclick="deletePosts(i)">Delete</button><br>';
            htmlContent +=          '<label id="content'+i+'">' + parseData[i]['post_content'] + '</label><br>';
            htmlContent +=          '<img>' +parseData[i]['']+  '</img>';
            htmlContent +=          '<br><button> Like </button> <button>Comments</button>';
            htmlContent +=      '</div>';

            $('#anaId').append(htmlContent);

        }     

    });


    $(".editPost").on("click", function(id){
        var txt=document.getElementById("content"+id).textContent;
        var editContent='<textarea id="txtArea">'+txt+'</textarea><br><button class="saveChanges">Ruaj</button><button>Anullo</button>';
        $('"#"+id').append(editContent);

        $(".saveChanges").on("click", function(){
            document.getElementById("content"+id).textContent=document.getElementsById("txtArea").value;
        });


          });
          
        function deletePosts(id) {
        alert( "are you sure you want to delete?" );
        $('"#"+id').remove();
      }




/*    //DELETE DUHET TE FUNKSIONOJE SI KJOOO
     var s='<button class="a"> a </button';
      $('#anaId').append(s);
     $(".a").on ("click", function () {
       alert("The button was clicked.");
       $(".a").remove();
      });


 */


      /*
      
$(".deletePost").on ("click", function () {
        alert( "are you sure you want to delete?" );
        $(this.id).remove();
    });

      function fshi(){
        alert("The button was clicked.");
        $(".a").remove();
      }
 

    $(".deletePost").on ("click", function () {
        $("postContent mb-2").remove();
      alert("The button was clicked.");
    });
    */
   

  /*    
    function deletePost(postId){
        //$('#anaId').removeChild(htmlContent);
    ///htmlContent.remove();

var posts=document.getElementsByClassName("postContent mb-2");
for (var i=0;i<posts.length;i++)
{
    document.getElementsByClassName("postContent mb-2")[i].remove();
    }}*/
});
