<?php
    // チェックしたい時刻
    echo "チェックしたい時刻（hour）を入力してください。"."\n";
    $time = trim(fgets(STDIN));
    // 時間の範囲を入力値
    echo "開始時刻（hour）を入力してください。"."\n";
    $start = trim(fgets(STDIN));  
    echo "終了時刻（hour）を入力してください。"."\n";
    $end = trim(fgets(STDIN));
    // 入力した値がvalidationチェック
    validCheck($time, $start, $end);

    // 範囲内かのチェック
    if (($start < $end) && (($start > $time) || ($end <= $time))) {
        echo "指定範囲外です。";
        exit;
    } else if (($start > $end) && (($start > $time && $time > 23) || ($time > $end))) {
        echo "指定範囲外です。";
        exit;
    }
    echo '指定範囲内です。';

    /**
     * validationチェック(numericとrangeチェック)
     * どっちらかが間違っている場合は処理せず、終了とする
     *
     */
    function validCheck($time, $start, $end) {
        if (!is_numeric($time) || !is_numeric($start) || !is_numeric($end)) {
            echo "入力値は数字で入力してください。";
            exit;
        }

        if (
            !in_array($time, range(0,23)) ||
            !in_array($start, range(0,23)) ||
            !in_array($time, range(0,23))
        ) {
            echo "時刻を0〜23時間以内で入力してください。";
            return false;
        }
    }
?>