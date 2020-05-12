 <?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corporates
 */

$shop_category = array(
    'taxonomy'     => 'product_cat',
    'hide_empty'   => false,
    'hierarchical' => 1,
    'exclude'      => array(52,84,82,86),
    'orderby'       => 'id',
    'order'         => 'ASC',
);
$cat_product = get_categories($shop_category);?>

<!--

POPUP

-->

<div class="popup-pravila">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Правила заказа</h2>
        </div>
        <div class="content">
          <?= get_field('pravila_zakaza','option')?>
      </div>
  </div>
</div>

<div class="popup-dostavka-opl">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Доставка и оплата</h2>
        </div>
        <div class="content">
           <?= get_field('dostavka_i_oplata','option')?>
       </div>
   </div>
</div>

<div class="popup-svjaz">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Заказать консультацию</h2>
        </div>
        <div class="content">
            <form class="form form-footer">
                <div>
                    <div class="error none">*Это поле не заполнено или заполнено не верно!</div>
                    <input type="text" class="name2" name="name2" placeholder="Имя">

                </div>
                <div>
                    <div class="error none">*Это поле не заполнено или заполнено не верно!</div>
                    <input type="text" class="email2" name="email2" placeholder="E-mail">
                </div>
                <div>
                    <div class="error none">*Это поле не заполнено или заполнено не верно!</div>
                    <input type="tel" class="phone2" name="phone2" placeholder="Телефон">
                </div>
                <div>
                    <textarea class="msg" name="msg" class="msg" placeholder="Сообщение"></textarea>
                </div>

                <div>
                    <div class="btn-form2">Отправить</div>
                </div>
            </form>
            <div class="result"></div>
        </div>
    </div>
</div>

<div class="popup-zvonok">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Заказать обратный звонок</h2>
        </div>
        <div class="content">
            <form class="form form-footer">

                <div>
                    <div class="error none">*Это поле не заполнено или заполнено не верно!</div>
                    <input type="text" class="name2" name="name2" placeholder="Имя">

                </div>
                <div>
                    <div class="error none">*Это поле не заполнено или заполнено не верно!</div>
                    <input type="text" class="email2" name="email2" placeholder="E-mail">
                </div>
                <div>
                    <div class="error none">*Это поле не заполнено или заполнено не верно!</div>
                    <input type="tel" class="phone2" name="phone2" placeholder="Телефон">
                </div>
                <div>
                    <textarea class="msg" name="msg" class="msg" placeholder="Сообщение"></textarea>
                </div>

                <div>
                    <div class="btn-form2" >Отправить</div>
                </div>
            </form>
            <div class="result"></div>
        </div>
    </div>
</div>








</div><!-- #content -->

<footer class="footer">
    <div class="col1-footer">
        <div class="logo-footer">
            <a href="http://coder.cx.ua/coder.sub/catalog/">
                <img src="<?= get_template_directory_uri()?>/img/logo.png" alt="<?php the_title()?>" />
            </a>
        </div>
        <div class="desc-footer">
         <?php the_field('descr','option');?>
     </div>
 </div>
 <div class="col2-footer">
    <div class="menu-footer">
        <ul>
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Доставка и оплата</a></li>
            <li><a href="#">Правила заказа</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
        <div class="contacts-in">
            <div class="tel-in">
                <a href="tel:<?php the_field('telefon','option');?>"><?php the_field('telefon','option');?></a>
            </div>
            <div class="zvon">
                Заказать обратный звонок
            </div>
            <div class="email">
                <a href="mailto:ptz-mihail@mail.ru"><?php the_field('e-mail','option')?></a>
            </div>
        </div>
    </div>
</div>
<div class="col3-footer">
    <div class="terms-menu">
        <ul>
            <?php
            foreach ($cat_product as $cat_p) :
                $category_id = $cat_p->term_id;
                ?>
                <li class=" category<?= $cat_p->term_id;?>">
                    <a href="<?= get_term_link($cat_p->term_id, $taxonomy = 'product_cat');?>">
                        <?php echo $cat_p->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="col4-footer">

    <?php if( have_rows('contact', 'option') ): ?>

        <?php while( have_rows('contact', 'option') ): the_row(); ?>

           <div class="adress">
            <div class="title-adress"><h3><?= get_sub_field('name');?></h3></div>
            <div class="tel-adr">
                <a href="tel:<?= get_sub_field('tel');?>"><?= get_sub_field('tel');?></a>
            </div>
            <div class="street">
                <?= get_sub_field('street');?>
            </div>
        </div>

    <?php endwhile; ?>

<?php endif; ?>

</div>
</footer>

<div class="infrmaition flex">
    <div>
        <p>© Товарный знак зарегестрирован.</p>
        <p>Свидетельство № 695057.</p> 
    </div>
    <div>
        <p>Госреестр товарных знаков РФ.</p> 
        <p>Правообладатель товарного знака</p>  
        <p>Якубенко Михаил Александрович.</p> 
    </div>
    <div>
        Все права защищены.
        Цены на сайте носят информационный характер
        и не является публичной офертой
    </div>
    <div>
        Соглашение на обработку персональных данных
    </div>
    <div>
        Политика конфидициальности
    </div>

</div>


<div class="popup-cart">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Товар добавлен в корзину</h2>
        </div>
        <div class="content links-go flex">
            <div class="catalog-go"><a href="http://coder.cx.ua/coder.sub/catalog/">Продолжить покупки</a></div>
            <div class="cart-go"><a href="http://coder.cx.ua/coder.sub/cart">Оформить заказ</a></div>
        </div>
    </div>
</div>

<div class="popup-dostavka-moscau">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Доставка по Москве</h2>
        </div>
        <div class="content">
         <?= get_field('dostavka','option')?>
     </div>
 </div>
</div>


<div class="popup-dostavka-piter">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Доставка в Санкт-Питербурге</h2>
        </div>
        <div class="content">
            <?= get_field('sankt-piterburge','option')?>
        </div>
    </div>
</div>

<div class="popup-dostavka-other">
    <div class="wrap-content-popup">
        <div class="close">X</div>
        <div class="title">
            <h2>Доставка в другой город</h2>
        </div>
        <div class="content">
            <?= get_field('dos_v_gorod','option')?>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>