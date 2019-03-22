<?php

use App\Gif;
use App\GifImage;
use Illuminate\Database\Seeder;

class GifsSeeder extends Seeder
{
    public function run(): void
    {
        $ids = [
            '6eVf1GVHoXbu8', 'bRJfTluD2nTj2', 'JjKHeBdmMKI7e', '3orif0tVjXkDLS0w5a', 'l2SpPEjWq19U5QxRS', 'LoILqBQuf94mQ',
            'GjJyr3HUHW3bG', 'pcIZi4S5K5VtVLcR0y', 'XzvSgBMq6mVhe', '124ipSkjT6SMb6', 'NE8AMxWZdb9RK', '3ohA2MS7x7jEseteAo',
            '6KMPwUYRDuziU', 'l1J9BUvEn6Gqh0xhe', '3o7TKp7zxU9OHjKiKQ', '3oKIPxwHGmpWFVT0WY', 'JxJGQ682beY8w', 'vnCgcqO02PhUA',
            'tQ1fG6D1qebkI', 'GdbxigoxHwRQ4', 'hhysTTQmBXaHS', '26Ffcw6GnSC5LtDz2', 'taA2tYSvuXtIY', 'B1YlspBGvxhdK',
            'AebNWFdS0taMw', '3o6MbleXJCuVuqHcJy', '3otOKRrkEG3cDuC8aA', 'w8NiB07PBMtbz6ssSs', 'xT5LMwYkyMDq2C810s',
            'xUPGcy3G1Aq7FCez3G', 'iPU7PCSKNQQNy', 'cFtDU6ofpoa7S', '8iVGPL8eoFDLa', '9P5kCQ7sRVzMSZI384', 'skZS5rTThBIoU',
            'q46bCdHpqNjag', '3orif3AAH2PKWZTTyg', 'heNeAfMqWqVoY', 'zUsIx3I2DmT0A', 'zE2Q6itVj8pr2', '4XPqhDYjMQPba',
            '4ZkxXoErzRUiO5xn9h', '5IvntLrOmSLPW', 'DfyDHg70YiaEU', 'dbxuKsl9L0yGY', 'ZCjHaaemsCoSY', 'atnEqQwT2jexy',
            '1ymGEaqCHLn4kXZ7mf', 'l4FARJaqS5LSbDcIM', '26ybwwmwYBTZEjkli', 'mXuPwQ4gqIncS6qx8Y', 'LGnpla06LFH1K', 'PR6YIRmkPSVxu',
            'YiVvcF23UWbmM', 'TzcldGoR5WGek', 'ULAqZ2o8WHUsg', '3o7bu416RccMY4NPwY', '1n8D3qLWjVnaPihp3P', 'sROXg0r9eAtSo',
            'xUA7b4IcYCVVC7yi5y', '3o7TKINAAAxBKr92r6', 'd47Hv1hCdvGnZgly', '3ohuAnbck3uHtBrj4A', 'LLbdDDGFgMR7q', 'cIt3iitjIGGPLN8QxI',
            'nukbzyJkEjQeA', 'xT1R9YXzOq9mWlM8yk', 'TA1LRnGTALjnW', 'l2YWBK8iI9ZXWUVsk', '7LfkaXCJHuGC4', 'r9g2fF29lqaD6',
            '26zz3NIE7P9dD2Foc', 'xT5LMMr33GKamTXMg8', 'Xo6fGHvIRXDK8', 'YePQFMYTFpEmA', 'l0HlGToylio615McM', 'qxE0VjMjaRfMc',
            'mZ5TXydN5SFYk', '3o6MbdWlQrVO33FcKA', 'Sxl97SYeZsaM8', 'evRYMoYW3EubK', '1236TYVkDJrwZy', '3o85xtTvxJxuJqeghi',
            '58qnhLTc0AwRa', 'xTiN0lUtwLuhgMp16g', 'l2JdZwSseY36YEs4o', 'Tfbvffs2pdLoc', 'l4FBbxvX8xJmCwUfu', '3o6wrDI19HlQooduAU',
            'pcyKRjQJnN1Kg', 'vQEBidDXpZdWU', 'xT1Ra4ltx87EUUC2xG', '2vhq2xArH5DUI', '3o6Zt7kSq0FOYUuCOY', '3og0IK5FHEBwENmqIg',
            'IrH2bn4cmuRYQ', 'op67lgNTdh1T2', '3ohfFIOaOtjZSrf5rG', '9P5kCQ7sRVzMSZI384', '9rcg1CafP5qCR2dWWq', '3orifiiAHrvQMVOe5i',
            '26FeYCOk90AYCz5xC', 'OtTx2Xmf2MeRO', '7LfkaXCJHuGC4', 'iNRO8o36mqddRQdwIS', 'MZQQWgzx0yuoE', '3ohhwsz92fbFtsaFjO',
            'qnKFl5BQ1pqgM', 'l46Cd6mITLNG6ImOc', 'vLJsSA6y87etW', 'Z9qkFQsqhAlVK', 'XJJOnHVOlQ23e', '3otPoQFIAx4P0zwEH6',
            '26Ffcw6GnSC5LtDz2', 'xUNd9HEPDW4ycLgPrW', 'tQFUQF5NtFB9m', 'LGnpla06LFH1K', 'ZiiEPXc3CFkLm', '3oEdv2f1HN9xh0ICWs',
            '1WdebxOqUKu76', 'WgQiOXQkB22f2r6ryT', '3o7TKp7zxU9OHjKiKQ', 'fxOMWibMNk2UU', '2kSURMMOqqXwYy86dn', 'mfPGoiI7iUcdG',
            'ezK2hhaK7sGiI', 'xTiN0lUtwLuhgMp16g', '3ov9jJDZfQMfk0F6Rq', 'YANbugLHmmrmM', 'zvSD2UTMabA9W', '3oKIPxwHGmpWFVT0WY',
            'AvaKatC5C9Sfe', 'PKD4CygloEzwk', 'gMB790A1sb3zO', 'z6mAhBIGUlyKY', 'SNSrHwKGITAFW', 'a5QduoJLauXsY', 'SYpP087j4sfFm',
            '3o7aCYdfPrmv1dYAbS', '3oeHLdogiHdqe2Xe5a', 'eRXp9jMZANNrq', 'Gt1aL0jZbZBqU', 'z5B2oCMu65x04', '3rgXBO5tTskeacfQvC',
            'scEhZ48aMJeec', 'l3JDIlpAQP8f8Ol4A', 'ZgxHOd4WiGm2s', 'vHTaO4W3HhEgU', 'r9g2fF29lqaD6', '69juzFhwsddVxJCItY',
            'yCerABV7ymRfW', 'l0Iy4HNnHuRP1oZMY', 'l2JeeqMOHK0ixfXUI', '9Y1tMIsqjQdDa', '1oOjTwgQoyYpi', 'xmTqeBTYWThNS',
            '874GeGb3Kkrh7AmCjr', 'hFJpRr42JswdG', 'bi5xcqXEhhslO', '26ufpKTwv5pNlZTtm', 'heNeAfMqWqVoY', 'lDnGwX0ABaR8Y',
            'F02YuPuJVeYLK', '2uTjVHOCiuF3O', '3o6MbcRBzP8VfbupmE', '5mQyFRp8D5DTa', '8iVGPL8eoFDLa', 'y56api7WLO88g',
            '124ipSkjT6SMb6', '3oD3Yjy1Ub0vuGj0Fa', 'WeTO12pvgtopq', 'xT9KVwTsWUoUXoT7uU', 'NdZdqFSGmIVyw', 'cHisOYmtoXs4g',
            '2vhq2xArH5DUI', 'xUNemZ0ID7tpjihQly', 'l2Je86Ae1twctM4Yo', 'PqiDUqjPgPV1m', '4VovcH0fPKgCI', 'Qc13jPNzR87yU',
            '3orifeyyA2jrLqBRug', 'wbez4oSeeogEM', '3otPosbh85cLEq2cXS', 'YVRWiihuMWHUk', 'l4FARJaqS5LSbDcIM', 'qsuMT6HAgVXna',
            'P4z3lYWKpmhgY', 'xn2NKUSfx8vS0', 'l3vR7kDVodQXNIO9W', 'LX9fMkdASAcbC', 'Qtr0lbHnV1qvK', 'lUp0jNahY0ZCU', '3zsHhwCKn3gru',
            '8WIUSfZpiphrW', 'xUySTR9b8rXJkjpzAk', '3o6ZtiuQFi7exCV2qQ', 'zvSD2UTMabA9W', '26gJzX8g1NiG29zws', 'l0HlTC0TWnzTyDNNm',
            'gIXCIiR58uYEM', 'GcjyjLJp7G5Og', 'FaVixYtDKmUmY', 'Ki1KAQYzKcmqY', 'DYEo4sZRzYh7q', 'ikTLqqcbjo8IE', 'heNeAfMqWqVoY',
            'l3V0d2BPxJ6goVJU4', '3orif4KjqNbCLRCLJu', 'lJBOlgmF8haDe', 'l1Joi1LtPXV4Xwrrq', '3ofSB8BZrEoOxoW7sc', 'xThuWcLt7Smyu3Tbna',
            'YiVvcF23UWbmM', '2cdYRWaAU13YPRMOXT', 'zdON8uPoPXWVO', '3ov9jI07lkP3rJFd9S', '3ogwFYKmExtaSCqpby', 'meNEVT0ubCc2k',
            '5YiRMTf3UklQ3Z0SSY', '3oEjHTwGkKX10PCKze', 'A2iNGMyc9zsNW', 'PivnY1QtKq9Vu', 'JJy9zyG3LOQUw', '3otPorNiLtaCkAz43e',
            'l0HlAneVIFRtBSexa', '3o6Ztlmp6EBegrlC9O', 'r3UHwsKIXxvZm', '49K2Q5LZpuZfG', '3ofT5QSLtIfT4ri5W0', 'HeeJwCijETDuU',
            '3o6MbcRBzP8VfbupmE', '3o7TKonbtVWvv12x2w', '3zsHhwCKn3gru', 'F546OZf9QC47e', '3o6ZtiuQFi7exCV2qQ', '3owzVYJgdHHNmqTfR6',
            'uFF0cgZLQMAyk', 'l46Cu2xSoGr8J9ZEk', 'JxJGQ682beY8w', 'l2JhCE4rPI482uRgs', 'xT1R9zP0dhShxogoqQ', 'XbKrxp4ahCGC4', 'zr4Ty8SKtOifm',
            'Yy0MkJCYPjR4s', 'Louod4tHteWR2', '3TqTYL6sjOLO8', '1ymGEaqCHLn4kXZ7mf', 'pEIA0y2JXhR0A', 'l4EoWkkOLY0fUCs0w', '7S7uUivTt7PvW',
            'ZvCXP7OUjQdGg', '26Ff78HYVTV2EzyLK', '3oKIP96AYkbVIaj7Yk', 'f4uuz04lRfdLO', '13yGdgFyLhTPnG', 'OucnQNtMhD9SM', '3orif0X0NtXPresE24',
            'd31vs3qbuLJ99vS8', '106kxMpBcvhBYY', 'xe1ygHfzfVKlG', '101cQQ2YjFCozC', 'DZAORNNBMeZKU', 'xUA7aM8ye5p3jOh0eA', 'mZ5TXydN5SFYk',
            'TbrXqLsnMZLDq', '10BodDZLg7tYhG', 'Hl9wTjb8VY24g', 'xUPGcjuy0g8ou8ifaE', '3ofT5Orqm2dEAmsjC0', '3orif0tVjXkDLS0w5a',
            'l0HlGToylio615McM', '149gonfGGECkM', '3ohfFCNpsReEkhGczm', '1xVfBttjb6DbRoe3M6', 'Jx9PNxNDvo43C', 'l4Ep1uXkbsibimiK4',
            'TzcldGoR5WGek', 'wnLqpACRVrkWc', '2gZQ7d5j9aF87d8yDH', 'atnEqQwT2jexy', 'KZIZuICgzpKdW', '26FeYCOk90AYCz5xC', '3oD3Yjy1Ub0vuGj0Fa',
            '3otPoJ6PPYNQDmK6GI', '3ohhwhBeL9mJPhnZo4', 'xUOwG27zlbldpZwJsk', 'B1YlspBGvxhdK', 'sn4uUCh6FHh8k', '6eVf1GVHoXbu8', 'qGDhUXWbSvTl6',
            'LX9fMkdASAcbC', 'LrwlTNOCwTSM0', '9OtIAEWPU1DfG', 'CPv2lXgygMY1i', 'lRmegRGjavhqE', 'NiEoCVMqmbSAE', 'KGabX3jEPdwac', 'KyxuhhZfzuTJuRNogq',
            '3ohze2Zb7426oykdMI', 'JCNT8FkxQJS80', 'l2Je86Ae1twctM4Yo', '12DolBvP0M4mY0', '149gonfGGECkM', 'EqlCU57QJ98U8', '3o7TKOVSJJ1fIul9wA',
            '3otPoQFIAx4P0zwEH6', 'wfPcHWn7S5jDG', 'SJtMcBywKeABa', 'xUNd9VaD7dPSaojEfm',
        ];

        foreach ($ids as $id) {

            $gif = new Gif(['giphy_id' => $id]);
            $gif->save();

            $image = new GifImage([
                'type'      => 'image_url',
                'url'       => 'https://media' . random_int(1, 3) . '.giphy.com/media/' . $id . '/giphy.gif',
                'file_name' => $id . '.gif',
            ]);

            $gif->images()->save($image);
        }
    }
}
