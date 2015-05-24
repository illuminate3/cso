<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder{

	public function run(){
		if(DB::table('categories')->exists())
			DB::table('categories')->delete();
		$node = App\Model\Category::create([
				'name' => 'Общие сведения о поставщике социальных услуг',
				'slug'=>'obschie_svedeniya_o_postavschike_sotsialnyih_uslug',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
				'children'=>[
						[
							'name' => 'Кадровое обеспечение',
							'slug' => 'personal',
							'active'=>1,
							'created_at'=>Carbon\Carbon::now(),
						],
				]

		]);
		
		$node = App\Model\Category::create([
				'name' => 'Структура и органы управления организации социального обслуживания',
				'slug' => 'struktura_i_organy_upravlenija_organizacii_social_nogo_obsluzhivanija',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),

		]);
		$node = App\Model\Category::create([
				'name' => 'Формы и виды социальных услуг',
				'slug' => 'formy_i_vidy_social_nyh_uslug',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
		]);
		$node = App\Model\Category::create([
				'name' => 'Тарифы на социальные услуги',
				'slug' => 'tarify_na_social_nye_uslugi',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
		]);
		$node = App\Model\Category::create([
				'name' => 'Получатели социальных услуг',
				'slug' => 'poluchateli_social_nyh_uslug',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
		]);
		$node = App\Model\Category::create([
				'name' => 'Материально-техническое обеспечение социальных услуг',
				'slug' => 'material_no-tehnicheskoe_obespechenie_social_nyh_uslug',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
		]);
		
		$node = App\Model\Category::create([
				'name' => 'Финансово-хозяйственная деятельность',
				'slug' => 'finansovo-hozjajstvennaja_dejatel_nost',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
				'children'=>[
					[
						'name' => 'Государственное задание',
						'slug' => 'gosudarstvennoe_zadanie ',
						'active'=>1,
						'created_at'=>Carbon\Carbon::now(),	
					],
					[					
						'name' => 'План',
						'slug' => 'plan',
						'active'=>1,
						'created_at'=>Carbon\Carbon::now(),	
					],
				]
		]);
		
		$node = App\Model\Category::create([
				'name' => 'Предписание органов государственного контроля и независимая оценка качества оказанных социальных услуг',
				'slug' => 'predpisanie_organov_gosudarstvennogo',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
		]);
		$node = App\Model\Category::create([
				'name' => 'Материально-техническое обеспечение социальных услуг',
				'slug' => 'material_no-tehnicheskoe_obespechenie_social_nyh_uslugi',
				'active'=>1,
				'created_at'=>Carbon\Carbon::now(),
		]);
		
		$node->save();
	}
}

               