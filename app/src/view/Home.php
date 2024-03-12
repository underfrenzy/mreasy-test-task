<?php

use module\user\UserService;

$user = UserService::findByToken($_COOKIE['token']);

if (!$user) {
    header("Refresh:0");
}
?>
<script src="../../assets/js/home.js" lang="js" type="text/javascript"></script>
<div class="container text-center">
    <div class="row vh-100">
        <div class="col">
        </div>
        <div class="col m-auto">
            <div class="container">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col p-5">
                                <span id="user-id" class="d-none"><?= $user['id'] ?></span>
                                <h1 id="user-counter"><?= $user['counter'] ?></h1>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <h4><?= $user['username'] ?></h4>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col">
                                <button type="button" id="increment" onclick="increment()" class="btn btn-primary">+1</button>
                            </div>
                        </div>
                        <div class="row p-2">
                            <button type="button" class="btn btn-danger" onclick="logout()">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            Column
        </div>
    </div>
</div>
