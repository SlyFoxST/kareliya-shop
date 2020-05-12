<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$args = array ('post_id' => $product->get_id()); 
$comments = get_comments( $args );
$count = get_comments_number($product->get_id());
?>

<div id="review_form_wrapper">
	<div id="review_form">
		<div id="respond" class="comment-respond">
			<span id="reply-title" class="comment-reply-title">
				<?php if($count < 1):?>
					Будьте первым, кто оставил отзыв на “<?php echo the_title();?>” 
				<?php else:?>
					<strong><?= $count . ' '; ?></strong> отзывов на “<?php echo the_title();?>”
					<p>Оставить отзыв: </p>
				<?php endif;?>
				<small>
					<a rel="nofollow" id="cancel-comment-reply-link" href="/coder.sub/shahmaty-onego-5/#respond" style="display:none;">
						Отменить ответ
					</a>
				</small>
			</span>			
			<form action="http://coder.cx.ua/coder.sub/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
				<div class="comment-form-rating"><label for="rating">Ваша оценка</label>

					<!-- <p class="stars">						
						<span>							
							<a class="star-1" href="#">1</a>
							<a class="star-2" href="#">2</a>							
							<a class="star-3" href="#">3</a>							
							<a class="star-4" href="#">4</a>							
							<a class="star-5" href="#">5</a>						
						</span>					
					</p> -->
					<select name="rating" id="rating" required="" style="display: none;">
						<option value="">Оценка…</option>
						<option value="5">Отлично</option>
						<option value="4">Хорошо</option>
						<option value="3">Средне</option>
						<option value="2">Неплохо</option>
						<option value="1">Очень плохо</option>
					</select>
				</div>
				<textarea id="comment" name="comment" cols="45" rows="8" required="" placeholder="Ваш отзыв"></textarea>
				<div class="flex wrap-reviews-btn">
					<div>
						<p class="form-submit">
							<input name="submit" type="submit" id="submit" class="submit" value="Отправить">
							<input type="hidden" name="comment_post_ID" value="488" id="comment_post_ID">
							<input type="hidden" name="comment_parent" id="comment_parent" value="0">
						</p><input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="8ad7abc002"><script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
					</div>
					<?php if($count > 0):?>
						<div class="btn-watch">Смотреть отзывы</div>
					<?php endif;?>
				</form>
			</div><!-- #respond -->
		</div>
	</div>

	<div class="clear"></div>
	<?php if($count > 0):?>
		<div class="wrap-reviews">
			<ul>
				<?php
				foreach ($comments as $val) {?>
				<li class="flex">
					<div class="flex">
						<div class="avatar">
							<img src="<?= get_template_directory_uri()?>/img/avatar.svg">
						</div>
						<div class="date-reviw">
							<div class="date-review">
								<?php 
								echo date_create($val->comment_date)->Format('Y-m-d');
								?>
							</div>

							<div class="comment-rview">
								<?php 
								echo $val->comment_content;
								?>
							</div>

						</div>
					</div>
				</li>
				<?php
	# code...
			}
			?>
		</ul>
	</div>
<?php endif;?>

