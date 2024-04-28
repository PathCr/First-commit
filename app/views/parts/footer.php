<?php

use S_Sait\View;

/*** @var $this View */

?>
<footer>
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <h4>Информация</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Главная</a></li>
                        <li><a href="#">О магазине</a></li>
                        <li><a href="#">Оплата и доставка</a></li>
                        <li><a href="#">Контакты</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Время работы</h4>
                    <ul class="list-unstyled">
                        <li>г. Краснодар</li>
                        <li>пн-вс: 9:00 - 18:00</li>
                        <li>без перерыва</li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="tel:5551234567">000 000-00-00</a></li>
                        <li><a href="tel:5551234567">000 000-00-00</a></li>
                        <li><a href="tel:5551234567">000 000-00-00</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-6">
                    <h4>Мы в сети</h4>
                    <div class="footer-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>



<button id="top">
    <i class="fas fa-angle-double-up"></i>
</button>

<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table text-start">
                    <thead>
                    <tr>
                        <th scope="col">Фото</th>
                        <th scope="col">Товар</th>
                        <th scope="col">Кол-во</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a href="#"><img src="<?= PATH ?>/assets/img/products/apple_cinema_30.jpg" alt=""></a>
                        </td>
                        <td><a href="#">Apple cinema</a></td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><img src="<?= PATH ?>/assets/img/products/canon_eos_5d_1.jpg" alt=""></a>
                        </td>
                        <td><a href="#">Canon EOS</a></td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><img src="<?= PATH ?>/assets/img/products/hp_1.jpg" alt=""></a>
                        </td>
                        <td><a href="#">HP</a></td>
                        <td>1</td>
                        <td>100</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger ripple" data-bs-dismiss="modal">Продолжить покупки</button>
                <button type="button" class="btn btn-primary">Оформить заказ</button>
            </div>
        </div>
    </div>
</div>


<?php
$this->getDblogs();
?>

<script>
    const PATH = '<?= PATH ?>';
</script>

<script src="<?= PATH ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="<?= PATH ?>/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= PATH ?>/assets/js/main.js"></script>
</body>
</html>