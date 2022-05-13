<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => '1',
                'name' => 'Стиральная машина Indesit IWUD 4085 (CIS)',
                'code' => 'Appliances',
                'amount' => 10,
                'price' => 22999,
                'image' => '/HpLwf2jIAe7DrXhmu2ytavldlwmHK21YXCPx8kjA.webp',
                'description' => 'Стиральная машина INDESIT IWUD 4085 оснащена электроприводом, что позволяет существенно сократить траты электроэнергии и воды, а также уменьшить шумовой эффект от работы до минимума. При небольших габаритах эта машинка позволяет погрузить до 4 кг белья. Энергосбережение было классифицировано, европейской организацией стандартов, оценкой «А», такой же оценкой отмечена эффективность стирки.'
            ],
            [
                'category_id' => '1',
                'name' => 'Робот-пылесос DEXP LF200 белый',
                'code' => 'Appliances',
                'amount' => 20,
                'price' => 6799,
                'image' => '/7hO4Ocb6DMS3bx0TrnPsZwsNjjbDIkgHeD8T2BWW.webp',
                'description' => 'Пылесос-робот DEXP LF200 будет поддерживать чистоту в вашем доме. Система с боковыми щетками обеспечивает тщательный сбор мусора и пыли. Фильтр HEPA задерживает пыль и аллергены, предотвращая их попадание в воздух. Данная модель оснащена 3 режимами работы, функциями ограничения зон и уборки по расписанию. Пластиковый контейнер объемом 0.3 л без труда очищается от собранного мусора.'
            ],
            [
                'category_id' => '2',
                'name' => 'Смартфон Samsung Galaxy A32 128 ГБ фиолетовый',
                'code' => 'mobile',
                'amount' => 12,
                'price' => 27499,
                'image' => '/cG8qu5ZQFNL7JRRwqXFFaZPoarl7gwzrb7iYtVf4.webp',
                'description' => 'Со смартфоном Samsung Galaxy A32 ваши «цифровые» возможности станут буквально неограниченными. В основе ее работоспособности – процессор MediaTek Helio G80, графический ускоритель Mali-G52 и 4 ГБ оперативной памяти. Этого достаточно, чтобы работать в огромном количестве приложений и проходить мобильные игры.',
            ],
            [
                'category_id' => '2',
                'name' => 'Смартфон Apple iPhone 13 mini 256 ГБ черный',
                'code' => 'mobile',
                'amount' => 10,
                'price' => 83999,
                'image' => '/EO5j87CeiWkohzauIwpiuDH1bgSeJdeiINNB9XuT.webp',
                'description' => 'iPhone 13 mini. Самая совершенная система двух камер на iPhone. Режим «Киноэффект» делает из видео настоящее кино. Супербыстрый чип A15 Bionic. Неутомимый аккумулятор. Прочный корпус. И еще более яркий дисплей Super Retina XDR.',
            ],
            [
                'category_id' => '3',
                'name' => 'Квадрокоптер DJI Mavic Mini Combo серый.',
                'code' => 'entertainment',
                'amount' => 2,
                'price' => 51499,
                'image' => '/cWWU37aZ6AE5hClCuCDLY2EyHb84nAKNLHeCEcHX.webp',
                'description' => 'Квадрокоптер DJI Mavic Mini Combo – исключительно легкий летательный аппарат. Масса модели, равная лишь 249 г, упрощает процесс эксплуатации с правовой точки зрения. Установлена 12-мегапиксельная камера, гарантирующая съемку видео с разрешением до 2720x1530. Максимальный угол обзора равен 83°. Управлять коптером можно со смартфона или посредством пульта дистанционного управления. Радиус действия пульта ДУ равен 2 км.',
            ],
            [
                'category_id' => '3',
                'name' => 'Игра настольная "Пирамидки"',
                'code' => 'entertainment',
                'amount' => 10,
                'price' => 2050,
                'image' => '/lA4B4uwZJDC3qQzXmMNiG4E4RiiOxQwFDH4ARqGU.webp',
                'description' => 'Настольная игра «Пирамидки» станет прекрасным подарком для любого малыша. В ее комплекте найдется масса фигурок в виде животных, которых в различных конфигураций можно размещать друг над другом, создавая таким образом башенки и пирамиды. Яркие цвета и привлекательный дизайн понравятся и мальчикам, и девочкам в возрасте двух лет и старше.'
            ],
        ]);
    }
}
