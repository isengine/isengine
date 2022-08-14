<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Local;

use is\Helpers\Parser;

use is\Masters\View;

$view = View::getInstance();

$sets = $this->settings['filtration'];

$link = Strings::replace($this->parents, ':', '/');
$link = '/' . ($link ? $link . '/' : null);

?>

<div class="row md-mt-05 md-ml-025 bg-gray-1 py-1">
	
	<div class="col-12">
		<div class="row justify-content-between align-items-center pb-1">
			<div class="col-auto fs-125">
				Фильтры
			</div>
			<a href="<?= $link; ?>" class="col-auto color-second fs-09">Очистить</a>
		</div>
	</div>
		
	<div class="col-12">
		<?php
			
			$data = [];
			$data[] = [
				'name' => 'service',
				'type' => 'service',
				'readonly' => true,
				'class' => 'none',
				'value' =>  'parents:' . $this->parents
					. '|page:' . $this->navigate->name_page
					. '|items:' . $this->navigate->name_items
					. '|sort:' . $this->navigate->name_sort
				,
				'options' => [
					'default' => 'Принять',
					'block' => 'default:button'
				]
			];
			
			Objects::each($sets['list'], function($item, $key) use ($sets, &$data) {
				
				$split = Objects::createByIndex(
                    [0, 1],
                    Strings::split($key, ':')
                );
				$name = $split[0];
				$type = $split[1];
				
				$lang = $sets['lang'][$name];
				if (!$lang) {
					$lang = $name;
				}
				
				$get = $this->filter->getData('data:' . $name);
				
				if ($type === 'range') {
					$get = Strings::split($get, '_');
				} elseif ($type === 'search') {
					$get = Strings::unfirst($get);
				} elseif (Strings::match($get, ':')) {
					$get = Strings::split($get, ':');
				}
				
				//System::debug($get);
				
				$list = !empty($this->filter->list[$name]) ? $this->filter->list[$name] : [];
				
				$data[] = [
					'name' => $key,
					'options' => [
						'description' => $lang,
						'block' => $item,
						'value' => $list,
						'data' => $get
					]
				];
				
			});
			
			$data[] = [
				'type' => 'submit',
				'class' => 'btn btn-primary mt-1',
				'options' => [
					'default' => 'Принять',
					'block' => 'default:button'
				]
			];
			
			// сюда нужно добавить обязательно еще одно служебное поле, которое будет давать информацию
			// о rest - ключах и включении rest вообще
			// хотя сам rest можно брать из конфига, т.к. в контенте rest используется чисто для навигации,
			// а не фильтров
			// настройки rest здесь могут помочь задавать исключительно page, items, sort - т.е. навигацию
			
			$view->get('module')->launch('form', 'default:filter', '{"data":' . Parser::toJson($data) . '}');
			
		?>
	</div>
	
</div>