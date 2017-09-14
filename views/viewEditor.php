<?php
    require_once (ROOT.'/views/viewHeader.php');
    $session = Session::getInstance();
?>
    <div class="container text-center p-t-3">
        <button class="btn btn-outline-success my-2 my-sm-0" id="back-editor">Back</button>
        <h1 class="display-2 m-t-3 header">Task Manager</h1>
        <p class="lead m-t-3">Check out these free task management software options</p>
        <div class="note-editor">
            <div class="form-group error-editor">
            </div>
            <div class="form-group">
                <input type="text" name="login" id="user-name" placeholder="User name" value="<?php echo $session->logged_user ?>" required />
            </div>
            <div class="form-group">
                <input type="email" name="email" id="user-email" placeholder="User email" required />
            </div>
            <textarea placeholder="Enter your task here..." id="user-task" rows="5" class="textarea" required ></textarea>
            <div class="form-group">
                <input type="file" name="task-img" id="user-img" accept="image/*,image/gif,image/jpg,image/png" onchange="uploadPhoto(this)"/>
            </div>
            <div class="from-group">
                <img src="" alt="" class="img-fluid" id="img-preview" style="display: none">
            </div>
            <div class="color-picker">
                <div class="yellow" onclick="colorPicker(this)">
                </div>
                <div class="red" onclick="colorPicker(this)">
                </div>
                <div class="green" onclick="colorPicker(this)">
                </div>
                <div class="blue" onclick="colorPicker(this)">
                </div>
            </div>
            <button class="btn add-button">Add</button>
        </div>
        <button class="btn btn-outline-info my-2 my-sm-0 btn-preview">Preview</button>
        <div class="row justify-content-md-center" style="margin-top: 20px; display: none">
            <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 preview-div" style="text-align: left">
                <h3 class="user-name-prev m-t-2"></h3>
                <h5 class="user-email-prev"></h5>
                <hr />
                <p class="task-text-prev"></p>
                <img src="" alt="" class="img-fluid img-user-prev">
            </div>
        </div>
    </div>
<?php
    require_once (ROOT.'/views/viewFooter.php');
?>
