<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

//$item = $this->getData();

$class = ['One', 'Two', 'Three', 'Four', 'Five'];

?>
<section class="faq-wrap-layout1">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-7 col-12">
				<div class="faq-content-layout1">
					<div class="item-heading">
						<h2 class="item-title title-bar-primary4">Frequently Ask Any Question</h2>
						<p class="sub-title">Have you any kind of question, please feel free ask us.</p>
					</div>
					<div class="faq-list-layout1">
						<div class="panel-group" id="accordion">
							<?php Objects::each($this->getData(), function($item, $key, $pos) use ($class) { ?>
							<div class="panel panel-default">
								<div class="panel-heading<?= $pos === 'first' || $pos === 'alone' ? ' active' : null; ?>">
									<div class="panel-title">
										<a aria-expanded="false" class="accordion-toggle<?= $pos === 'first' || $pos === 'alone' ? null : ' collapsed'; ?>" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $class[$key]; ?>"><?= $item['title']; ?></a>
									</div>
								</div>
								<div aria-expanded="false" id="collapse<?= $class[$key]; ?>" role="tabpanel" class="panel-collapse collapse<?= $pos === 'first' || $pos === 'alone' ? ' show' : null; ?>">
									<div class="panel-body">
										<?= $item['description']; ?>
									</div>
								</div>
							</div>
							<?php }); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-5 d-none d-lg-block">
				<div class="faq-img-layout1">
					<img src="/img/figure/faq.png" alt="about" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>