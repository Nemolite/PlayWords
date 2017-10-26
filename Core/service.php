<?php
class Test
{

    /**
     * @param $period is string (only 'hour' or 'day')
     * @param $method mayby numeric or string
     * @param $count_max is only numeric
     *
     * @return bool (false or true)
     *
     * @throws Exception if agrgument 1 none or something other than these 'hour','day'
     */

    //метод извлекает данные за перод (или за 30 минут или за 12 часов)
    // из хранилища $redis и проверят либо данные
    // за 30 минут, либо за 12 часов сравнивая его с максимальным
    //возвращает true когда все ОК

    // если период не задан возникает ошибка

    // если сумма извлеченных данных меньше чем $count_max
    // ключ инкрементируется и удаляется по истечении суток

    // метод предназначен для отслеживание скачка объемов продаж за определенный период

    public static function guard_count($period, $method, $count_max)
    {
        if ($period == 'hour') {
            $tp = floor(time() / 1800); // 30 минут

        } else if ($period == 'day') {
            $tp = floor(time() / (3600 * 12)); // 12 часов

        } else throw new Exception(); // в первом аргументе метода всегда ожидается
                                      // 'hour' или 'day' иначе будет исключение
                                      // типа Fatal error: Uncaught Exception
                                      // если 1 аргумента вовсе не будет то в добавок
                                      // интерпретатор
                                      // выбросит предупреждение
                                      // на подобие Warning: Missing argument 1


        if (!\Config::get('zoon', 'is_production')) return false;
        // метод get вернет определенные занчение для подключения
        // если нет встроенного статического метода get метод возвратит false

        $redis = RedisProvider::getInstance();
        // из хранилища достается объект, который хранит данные в виде ключ значение ()
        // другими словами сервис структур данных


        $keyP = 'guard' . $method . ($tp - 1); // собираем ключи , чтобы потом извлеч данные по этим ключам
              //  $tp - 1 - означает за прошлый период  у него свой ключ $keyP
        $key = 'guard' . $method . $tp; // для $redis , ключ вида guardМЕТОДчисло - это позволительно

        // сумма данных за прошлый период и за настоящий должно быть больше $count_max
        if ($redis->get($key) + $redis->get($keyP) > $count_max) return true;
        // извлекаем данные сравниваем его с максимальной величиной
        // можно проверять за период 30 минут, если задать в 1 аргументе hour
        // либо же за период 12 часов, если 1 аргумент day

        $redis->incr($key); // увеличивает (инкриментируем) данные по этому ключу
        $redis->expire($key, 86400); // устанавливаем тайм-оут на ключ в  1 сутки а после удалаем
        return false;
    }
}





