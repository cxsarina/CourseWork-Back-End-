<?php
$this->Title = 'Гітари';
?>
<style>
    .card-title a {
        color: inherit;
        text-decoration: none;
    }

    .card-title a:hover {
        text-decoration: underline;
    }
    .card-img-top {
        object-fit: cover;
        height: 300px;
        width: 100%;
    }
    .custom-card {
        margin: 0 10px;
    }
</style>
<div class="row">
    <div class="col-sm-4 mb-2 mb-sm-0">
        <div class="card text-center mb-3">
            <img src="/images/classicguitar.jpg" class="card-img-top" alt="Класичні гітари">
            <div class="card-body">
                <h5 class="card-title"><a href="/guitars/classic">КЛАСИЧНІ ГІТАРИ</a></h5>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-center mb-3">
            <img src="/images/electricguitar.jpg" class="card-img-top" alt="Електрогітари">
            <div class="card-body">
                <h5 class="card-title"><a href="/guitars/electric">ЕЛЕКТРОГІТАРИ</a></h5>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card text-center mb-3">
            <img src="/images/acousticguitar.jpg" class="card-img-top" alt="Акустичні гітари">
            <div class="card-body">
                <h5 class="card-title"><a href="/guitars/acoustic">АКУСТИЧНІ ГІТАРИ</a></h5>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-sm-4 custom-card">
            <div class="card text-center mb-3">
                <img src="/images/electroacousticguitar.jpg" class="card-img-top" alt="Електро-акустичні гітари">
                <div class="card-body">
                    <h5 class="card-title"><a href="/guitars/electroacoustic">ЕЛЕКТРО-АКУСТИЧНІ ГІТАРИ</a></h5>
                </div>
            </div>
        </div>
        <div class="col-sm-4 custom-card">
            <div class="card text-center mb-3">
                <img src="/images/accessoriesguitar.jpg" class="card-img-top" alt="Аксесуари">
                <div class="card-body">
                    <h5 class="card-title"><a href="/guitars/accessories">АКСЕСУАРИ</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>