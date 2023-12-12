<?php
get_header();
?>
<div class="title-container shadow-lg">
	<div class="wrapper wrapper-post-single">
		<h1 class="post-title"><?=$artikel['judul_artikel']?></h1>
		<div class="clearfix post-meta-single">
			<ul>
				<li class="author">
					<i class="far fa-user"></i>
					<a href="https://jagowebdev.com/author/agusph/" title="Posts by Agus Prawoto Hadi" rel="author">Agus Prawoto Hadi</a>
				</li>
				<li class="time">
					<i class="far fa-calendar-alt"></i>
					<!-- <span itemprop="dateModified"> -->
					Last Update: <time itemprop="dateModified" datetime="2021-04-19T05:32:21+00:00">
					19-04-2021					</time>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="row article-single-container">
		<div class="col-sm-12 col-md-8 main-column shadow-sm">
			<?php
			echo $artikel['konten']?>
		</div>
		<div class="col-sm-12 col-md-4 sidebar-column">
			<div class="widget-item">
				<form role="search" method="get" id="searchform" action="https://jagowebdev.com">
					<input type="text" value="" name="s" id="s" placeholder="Search...">
					<button type="submit" class="icon-search" value=""></button>
				</form>
			</div>
			<div id="mc_embed_signup" class="sidebar-subscribe">
				<form action="//mail.jagowebdev.com/lists/5a7714c939534/embedded-form-subscribe-captcha" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
					<div id="mc_embed_signup_scroll">
						<h2>Newsletter</h2>
						<p>
							Jadilah yang pertama tahu berita terbaru dari Jagowebdev.com
						</p>
						<div class="mc-field-group">
							<input type="text" value="" name="NAME" class="required" id="mce-FNAME" placeholder="Nama Lengkap">
						</div>
						<div class="mc-field-group">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5fa08dc7432f6daec96f0e2ac_5df0e63092" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					</div>
				</form>
			</div>
			
			<div class="widget-item"><h2 class="widget-title">Artikel Pilihan</h2>
				<div class="widget-sticky"><ul>			<li>
					<img width="150" height="91" src="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="Membuat Tabel Responsive Dengan HTML dan CSS 3" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png 150w, https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-275x167.png 275w, https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1.png 510w" data-srcset="" sizes="(max-width: 150px) 100vw, 150px"><noscript><img width="150" height="91" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="Membuat Tabel Responsive Dengan HTML dan CSS 3" loading="lazy" srcset="" data-srcset="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png 150w, https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-275x167.png 275w, https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1.png 510w" sizes="(max-width: 150px) 100vw, 150px" /><noscript><img width="150" height="91" src="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Membuat Tabel Responsive Dengan HTML dan CSS 3" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-150x91.png 150w, https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1-275x167.png 275w, https://jagowebdev.com/wp-content/uploads/2017/04/Membuat-Tabel-Responsive-Dengan-HTML-dan-CSS-3-1.png 510w" sizes="(max-width: 150px) 100vw, 150px" /></noscript>				<h4><a href="https://jagowebdev.com/membuat-tabel-responsive-dengan-css/">Membuat Tabel Responsive Dengan CSS – 4 Alternatif</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="150" height="91" src="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="Cookie Pada PHP - Panduan Lengkap" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png 150w, https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-275x167.png 275w, https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap.png 510w" data-srcset="" sizes="(max-width: 150px) 100vw, 150px"><noscript><img width="150" height="91" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="Cookie Pada PHP - Panduan Lengkap" loading="lazy" srcset="" data-srcset="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png 150w, https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-275x167.png 275w, https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap.png 510w" sizes="(max-width: 150px) 100vw, 150px" /><noscript><img width="150" height="91" src="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Cookie Pada PHP - Panduan Lengkap" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-150x91.png 150w, https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap-275x167.png 275w, https://jagowebdev.com/wp-content/uploads/2016/10/Cookie-Pada-PHP-Panduan-Lengkap.png 510w" sizes="(max-width: 150px) 100vw, 150px" /></noscript>				<h4><a href="https://jagowebdev.com/cookie-pada-php/">Cookie Pada PHP – Panduan Lengkap</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="150" height="150" src="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="Mendesain Form Login Dengan CSS" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png 150w, https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-80x80.png 80w" data-srcset="" sizes="(max-width: 150px) 100vw, 150px"><noscript><img width="150" height="150" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="Mendesain Form Login Dengan CSS" loading="lazy" srcset="" data-srcset="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png 150w, https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-80x80.png 80w" sizes="(max-width: 150px) 100vw, 150px" /><noscript><img width="150" height="150" src="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Mendesain Form Login Dengan CSS" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-150x150.png 150w, https://jagowebdev.com/wp-content/uploads/2016/10/Mendesain-Form-Login-Dengan-CSS3-80x80.png 80w" sizes="(max-width: 150px) 100vw, 150px" /></noscript>				<h4><a href="https://jagowebdev.com/mendesain-form-login-dengan-css/">Mendesain Form Login Dengan CSS 3 – Clean dan Responsive</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="150" height="150" src="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="10 Desain Tabel HTML Dengan CSS 3" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png 150w, https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-80x80.png 80w" data-srcset="" sizes="(max-width: 150px) 100vw, 150px"><noscript><img width="150" height="150" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="10 Desain Tabel HTML Dengan CSS 3" loading="lazy" srcset="" data-srcset="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png 150w, https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-80x80.png 80w" sizes="(max-width: 150px) 100vw, 150px" /><noscript><img width="150" height="150" src="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="10 Desain Tabel HTML Dengan CSS 3" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-150x150.png 150w, https://jagowebdev.com/wp-content/uploads/2016/09/10-Desain-Tabel-HTML-Dengan-CSS-3-80x80.png 80w" sizes="(max-width: 150px) 100vw, 150px" /></noscript>				<h4><a href="https://jagowebdev.com/top-10-desain-tabel-menarik-dengan-css/">10 Ide Desain Tabel Menarik Dengan CSS 3 – Fresh Design</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="100" height="63" src="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="Character Set dan Collation Pada MySQL" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png 100w, https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL.png 510w" data-srcset="" sizes="(max-width: 100px) 100vw, 100px"><noscript><img width="100" height="63" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="Character Set dan Collation Pada MySQL" loading="lazy" srcset="" data-srcset="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png 100w, https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL.png 510w" sizes="(max-width: 100px) 100vw, 100px" /><noscript><img width="100" height="63" src="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png" class="attachment-thumbnail size-thumbnail wp-post-image" alt="Character Set dan Collation Pada MySQL" loading="lazy" srcset="https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL-100x63.png 100w, https://jagowebdev.com/wp-content/uploads/2016/04/Character-Set-dan-Collation-Pada-MySQL.png 510w" sizes="(max-width: 100px) 100vw, 100px" /></noscript>				<h4><a href="https://jagowebdev.com/character-set-dan-collation-pada-mysql/">Character Set dan Collation Pada MySQL – Yakin Sudah Paham?</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="100" height="100" src="https://jagowebdev.com/wp-content/uploads/2015/12/15_efek_social_media_button_I-100x100.jpg" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/12/15_efek_social_media_button_I-100x100.jpg" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="15_efek_social_media_button_I" loading="lazy"><noscript><img width="100" height="100" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/12/15_efek_social_media_button_I-100x100.jpg" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="15_efek_social_media_button_I" loading="lazy" /><noscript><img width="100" height="100" src="https://jagowebdev.com/wp-content/uploads/2015/12/15_efek_social_media_button_I-100x100.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="15_efek_social_media_button_I" loading="lazy" /></noscript>				<h4><a href="https://jagowebdev.com/membuat-15-efek-social-media-button-dengan-css-part-i/">Membuat 15 Efek Social Media Button Dengan CSS Part I</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="100" height="100" src="https://jagowebdev.com/wp-content/uploads/2015/11/get_post_pada_php_http-100x100.jpg" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/11/get_post_pada_php_http-100x100.jpg" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="get_post_pada_php_http" loading="lazy"><noscript><img width="100" height="100" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/11/get_post_pada_php_http-100x100.jpg" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="get_post_pada_php_http" loading="lazy" /><noscript><img width="100" height="100" src="https://jagowebdev.com/wp-content/uploads/2015/11/get_post_pada_php_http-100x100.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="get_post_pada_php_http" loading="lazy" /></noscript>				<h4><a href="https://jagowebdev.com/memahami-get-dan-post-pada-php-dan-http/">Memahami GET dan POST Pada PHP dan HTTP</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="100" height="100" src="https://jagowebdev.com/wp-content/uploads/2015/11/character_set_encoding-100x100.jpg" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/11/character_set_encoding-100x100.jpg" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="character_set_encoding" loading="lazy"><noscript><img width="100" height="100" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/11/character_set_encoding-100x100.jpg" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="character_set_encoding" loading="lazy" /><noscript><img width="100" height="100" src="https://jagowebdev.com/wp-content/uploads/2015/11/character_set_encoding-100x100.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="character_set_encoding" loading="lazy" /></noscript>				<h4><a href="https://jagowebdev.com/character-set-dan-character-encoding/">Memahami Character Set dan Character Encoding</a></h4>
					<div class="clear"></div>
				</li>
							<li>
					<img width="150" height="150" src="https://jagowebdev.com/wp-content/uploads/2015/09/php_session-150x150.jpg" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/09/php_session-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image lazy-loaded" alt="session_pada_php" loading="lazy"><noscript><img width="150" height="150" src="//jagowebdev.com/wp-content/plugins/a3-lazy-load/assets/images/lazy_placeholder.gif" data-lazy-type="image" data-src="https://jagowebdev.com/wp-content/uploads/2015/09/php_session-150x150.jpg" class="lazy lazy-hidden attachment-thumbnail size-thumbnail wp-post-image" alt="session_pada_php" loading="lazy" /><noscript><img width="150" height="150" src="https://jagowebdev.com/wp-content/uploads/2015/09/php_session-150x150.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="session_pada_php" loading="lazy" /></noscript>				<h4><a href="https://jagowebdev.com/memahami-session-pada-php/">Memahami Session Pada PHP dan Penggunaannya</a></h4>
					<div class="clear"></div>
				</li>
				</ul></div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();