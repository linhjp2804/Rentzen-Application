<?php
include '../view/header.php';
?>
        <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.2/js/vendor/jquery.ui.widget.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.2/js/jquery.iframe-transport.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.2/js/jquery.fileupload.min.js"></script>
        
        <script>
            $(function()
            {
                $("#fileupload").fileupload({
                    url: "https://vgy.me/upload",
                    dataType: "json",
                    done: function(e, data)
                    {
                        // For single-file upload
                        if(typeof data.result.url != "undefined")
                        {
                            console.log(data);
                            // outputs <p>https://vgy.me/u/abc123</p>
                            //$("<p/>").text(data.result.url).appendTo(document.body);
                            $("#imageurl").val(data.result.image);
                            $("#imagetag").attr("src",data.result.image);
                        }
                    }
                });
            });
        </script>
        
        <div class="container" >
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10">

                <form method='post' action='index.php'>
                <input id="fileupload" type="file" name="file[]" >
                <img id="imagetag" src="" style="max-width:100%"><br>
                <input id="imageurl" name="imageurl" value=""><br>
                <input id="property_id" name="property_id" value="<?php echo $_GET['property_id'];?>"><br>
                <input id="btnAddPicture" type="submit" name="btnAddPicture" value="Add Picture">
                </form>
                
                </div>
                <div class="col-sm-1">
                </div>
                    
            </div>
        </div>
        
    </body> 
<?php
include '../view/footer.php';
?>
