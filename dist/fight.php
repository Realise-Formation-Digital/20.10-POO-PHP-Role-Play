<?php

require 'templates/gameHeader.php';

?>

<div class="container">
    <br />
    <br />
    <br />
    <br />
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>Vilain</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-warning text-center" role="alert">
                    <span>
                        <span class="mx-4" title='XP'>
                            <i class="fas fa-star"></i>
                            <span>0</span>
                        </span>
                        <span class="mx-4" title='Health'>
                            <i class="fas fa-heart"></i>
                            <span>10</span>
                        </span>
                        <span class="mx-4" title='Strength'>
                            <i class="fas fa-fist-raised"></i>
                            <span>1</span>
                        </span>
                        <span class="mx-4" title='Stamina'>
                            <i class="fas fa-shield-alt"></i>
                            <span>1</span>
                        </span>
                        <span class="mx-4" title='Weapon'>
                            <i class="fas fa-magic"></i>
                            <span>1</span>
                        </span>
                        <span class="mx-4" title='Bitcoin'>
                            <i class="fas fa-coins"></i>
                            <span>20</span>
                        </span>
                    </span>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-success mr-2">Fight <i class="fas fa-heart-broken"></i></button>
                        <button type="button" class="btn btn-danger">Escape <i class="fas fa-running"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
</div>

<?php

require 'templates/gameFooter.php';

?>