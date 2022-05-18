<?php

namespace is;

use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

// код

?>

<div class="container py-5">
	<div class="row justify-content-center py-5">
		<div class="col-12 col-md text-center text-md-end">
			<img class="logo-main" src="https://raw.githubusercontent.com/isengine/docs/master/logo/logo.svg" alt="<?= $view->get('lang|title'); ?>">
		</div>
		<div class="col-12 col-md text-center text-md-start">
			<div class="row py-4">
				<div class="col-12">
					<h1 class="display-2 lh-sm">
						<?= $view->get('lang|title'); ?>
						<div class="fs-1">
							<?= $view->get('lang|offer'); ?>
						</div>
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<a
						href="/docs/"
						role="button"
						class="btn btn-outline-primary rounded-pill py-2 px-4 mb-2 me-2 text-uppercase"
					>
						<?= $view->get('lang|this:docs'); ?>
					</a>
					<a
						href="https://github.com/isengine/isengine"
						target="blank"
						role="button"
						class="btn btn-secondary rounded-pill py-1 ps-3 pe-4 mb-2 me-2 text-uppercase"
					>
						<i class="fa fa-github fa-2x align-middle" aria-hidden="true"></i>
						<span style="vertical-align: -5%;" class="ps-2 pe-1">
							Github
						</span>
						<i class="fa fa-external-link text-white-50" style="vertical-align: -5%; font-size: 0.8em;" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center py-5 text-center">
		<div class="col-12 col-xl-9 my-5">
			<span class="display-6 pb-4">
				<?= $view->get('lang|description'); ?>
			</span>
		</div>
	</div>
	<div class="row text-center">
		<?php
			Objects::each($view->get('lang|this:blocks'), function($item){
		?>
		<div class="col-8 offset-2 col-lg offset-lg-0 block">
			<h3 class="text-primary py-3">
				<?= $item['title']; ?>
			</h3>
			<div class="block-description px-3">
				<?= $item['description']; ?>
			</div>
			<div class="d-lg-none block-separator border-bottom border-primary mt-4 mb-2"></div>
		</div>
		<?php
			});
		?>
	</div>
</div>

<section class="bg-light mt-5">
	<div class="container-fluid py-5 px-5">
		
		<div class="row text-center">
			<div class="col-12 offset-0 col-md-10 offset-md-1 text-start">
				<div class="row mb-5 pb-md-4 align-items-center">
					<div class="col-md-5">
						<span class="fa-stack fa-2x">
							<i class="fa fa-square fa-stack-2x text-primary"></i>
							<i class="fa fa-code fa-stack-1x fa-inverse"></i>
						</span>
						<h2 class="display-5">
							<?= $view->get('lang|this:install:title'); ?>
						</h2>
						<p class="lead">
							<?= $view->get('lang|this:install:sub'); ?>
						</p>
						<p>
							<?= $view->get('lang|this:install:description'); ?>
						</p>
						<a class="btn btn-lg btn-outline-primary mb-3 fs-6" href="/docs/"><?= $view->get('lang|common:readmore'); ?></a>
					</div>
					<div class="col-md-7 ps-md-5">
						<?= $view->get('lang|this:install:use'); ?>
						<div class="p-3 my-2 bg-secondary rounded">
<code class="text-white">composer create-project --stability dev --prefer-dist isengine/isengine FOLDER</code>
						</div>
						<?= $view->get('lang|this:install:comment'); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row text-center">
			<div class="col-12 offset-0 col-md-10 offset-md-1 text-start">
				<div class="row mb-5 pb-md-4 align-items-center">
					<div class="col-md-5">
						<span class="fa-stack fa-2x">
							<i class="fa fa-square fa-stack-2x text-primary"></i>
							<i class="fa fa-rocket fa-stack-1x fa-inverse"></i>
						</span>
						<h2 class="display-5">
							<?= $view->get('lang|this:reactive:title'); ?>
						</h2>
						<p class="lead">
							<?= $view->get('lang|this:reactive:sub'); ?>
						</p>
						<p>
							<?= $view->get('lang|this:reactive:description'); ?>
						</p>
						<a class="btn btn-lg btn-outline-primary mb-3 fs-6" href="/docs/"><?= $view->get('lang|common:readmore'); ?></a>
					</div>
					<div class="col-md-7 ps-md-5">
						<?= $view->get('lang|this:reactive:use'); ?>
						<div class="p-3 my-2 bg-secondary rounded">
<pre><code class="text-white">"develop" : {
  "enable" : true,
  "reactive" : "3"
}</code></pre>
						</div>
						<?= $view->get('lang|this:reactive:comment'); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row text-center">
			<div class="col-12 offset-0 col-md-10 offset-md-1 text-start">
				<div class="row mb-5 pb-md-4 align-items-center">
					<div class="col-md-5">
						<span class="fa-stack fa-2x">
							<i class="fa fa-square fa-stack-2x text-primary"></i>
							<i class="fa fa-globe fa-stack-1x fa-inverse"></i>
						</span>
						<h2 class="display-5">
							<?= $view->get('lang|this:language:title'); ?>
						</h2>
						<p class="lead">
							<?= $view->get('lang|this:v:sub'); ?>
						</p>
						<p>
							<?= $view->get('lang|this:language:description'); ?>
						</p>
						<a class="btn btn-lg btn-outline-primary mb-3 fs-6" href="/docs/"><?= $view->get('lang|common:readmore'); ?></a>
					</div>
					<div class="col-md-7 ps-md-5">
						<?= $view->get('lang|this:language:use'); ?>
						<div class="p-3 my-2 bg-secondary rounded">
<pre><code class="text-white">namespace is;
use is\Masters\View;

$view = View::getInstance();

echo $view->get('lang|title');
echo $view->get('lang|information:phone:0');
</code></pre>
						</div>
						<?= $view->get('lang|this:language:comment'); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row text-center">
			<div class="col-12 offset-0 col-md-10 offset-md-1 text-start">
				<div class="row mb-5 pb-md-4 align-items-center">
					<div class="col-md-5">
						<span class="fa-stack fa-2x">
							<i class="fa fa-square fa-stack-2x text-primary"></i>
							<i class="fa fa-cube fa-stack-1x fa-inverse"></i>
						</span>
						<h2 class="display-5">
							<?= $view->get('lang|this:template:title'); ?>
						</h2>
						<p class="lead">
							<?= $view->get('lang|this:template:sub'); ?>
						</p>
						<p>
							<?= $view->get('lang|this:template:description'); ?>
						</p>
						<a class="btn btn-lg btn-outline-primary mb-3 fs-6" href="/docs/"><?= $view->get('lang|common:readmore'); ?></a>
					</div>
					<div class="col-md-7 ps-md-5">
						<?= $view->get('lang|this:template:use'); ?>
						<div class="p-3 my-2 bg-secondary rounded">
<pre><code class="text-white">namespace is;
use is\Masters\View;

$view = View::getInstance();

$view->get('block')->launch('name');
$view->get('module')->launch('map');
</code></pre>
						</div>
						<?= $view->get('lang|this:template:comment'); ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>

<section class="">
	<div class="container-fluid py-5 px-5">
		<div class="row text-center">
			<div class="col-12 offset-0 col-md-10 offset-md-1 text-center">
				<h3 class="pt-4 pb-2">
					<?= $view->get('lang|this:more-title'); ?>
				</h3>
				<div class="fs-4 pt-2 pb-4">
					<?= $view->get('lang|this:more-sub'); ?>
				</div>
				<?php
					Objects::each($view->get('lang|this:more'), function($item){
				?>
				<p class="text-lg-start">
					<?= $item; ?>
				</p>
				<?php
					});
				?>
			</div>
		</div>
	</div>
</section>
