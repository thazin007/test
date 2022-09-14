<?php
    // ボート横長さ入力値
    $inputLength = trim(fgets(STDIN));
    // コインデータ入力値
    $coinData = trim(fgets(STDIN));
    $coinArray = str_split($coinData);
    // 入力する桁数とコインデータ数が合わない場合は処理終了
    if ($inputLength != count($coinArray)) {
        echo "ボート横長さとコインデータが一致していません。";
        exit;
    }

    // ゲームスタット
    $first = $coinArray[0];
    $second = $coinArray[1];
    for ($i = 2; $i < $inputLength; $i++) {
        $third = $coinArray[$i];
        if ($first != $second && $second != $third && $first == $third) {
            $coinArray[$i-1] = changeCoin($second);
        }
        $first = $coinArray[$i-1];
        $second = $coinArray[$i];
    }

    // 結果を出力する
    echo count(array_keys($coinArray, "b"))."\n";

    /**
     * コインの色を変更する(bとwしか入力しない前提)
     * b -> w
     * w -> b
     */
    function changeCoin($coin) {
        return ($coin == 'b') ? 'w' : 'b';
    }
?>