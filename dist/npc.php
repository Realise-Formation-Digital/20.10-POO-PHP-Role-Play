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
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="?id=npc">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?id=sell">Sell</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col" title='Strength'><i class="fas fa-fist-raised"></i></th>
                            <th scope="col" title='Stamina'><i class="fas fa-shield-alt"></i></th>
                            <th scope="col" title='Price'><i class="fas fa-coins"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="buyWeapon" id="buyWeapon" value="buyWeapon" checked>
                                </div>
                            </th>
                            <td>Excalibkjgkur</td>
                            <td>2</td>
                            <td>4</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="buyWeapon" id="buyWeapon" value="buyWeapon">
                                </div>
                            </th>
                            <td>Excalhgfhibur</td>
                            <td>2</td>
                            <td>4</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="buyWeapon" id="buyWeapon" value="buyWeapon">
                                </div>
                            </th>
                            <td>Excalidgdgfbur</td>
                            <td>2</td>
                            <td>4</td>
                            <td>15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <button type="button" class="btn btn-success mr-2">Buy <i class="fas fa-shopping-cart"></i></button>
                        <button type="button" class="btn btn-danger">Cancel <i class="fas fa-times-circle"></i></button>
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