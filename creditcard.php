<?php
    // クレジットカードの総数入力値
    $inputLine = trim(fgets(STDIN));
    $result = [];
    for ($i = 0; $i < $inputLine; $i++) {
        // クレジットカート番号入力値
        $cardNo = trim(fgets(STDIN));
        // クレジットカードの桁数が16桁ではない場合、処理を終了
        $cardnoArray = str_split($cardNo);
        $digits = count($cardnoArray);
        if ($digits != 16) {
            echo "クレジットカード番号を16桁で入力してください。";
            exit;
        }
        // evenとoddのそれそれの総和計算
        $even = $odd = 0;
        for ($j = 0; $j < $digits - 1; $j++) {
            $one = 1;
            $bitwiseAnd = $j & $one;
            if ($bitwiseAnd == 1) {
                $odd += intval($cardnoArray[$j]);
            } else {
                $twice = intval($cardnoArray[$j]) * 2;
                $even += sumToOneDigit($twice);
            }
        }
        // Xの値を計算
        $X = 10 - (($even + $odd) % 10);
        $result[] = $X;
    }
    // 結果を出力する
    for ($i = 0; $i < $inputLine; $i++) {
        echo $result[$i]."\n";
    }

    /**
     * ２桁の数字の場合は総和計算して１桁にする処理
     */
    function sumToOneDigit(int $number) {
        $sum = $number;
        while (strlen($sum) > 1) {
            $numberArray = str_split($sum);
            $sum = array_sum($numberArray);
        }
        return $sum;
    }
?>