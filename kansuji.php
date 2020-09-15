<?php
//
// https://github.com/ib97/kansuji
//
function kansuji($num){
    $num = array_reverse(str_split((string)$num));
    $keta = array("","十","百","千","万","十","百","千","億","十","百","千","兆");
    $res = array();
    for ($i = 0; $i < count($num); $i++) {
        $res[] = $keta[$i];                             // 配列に桁と値を追加する
        $res[] = str_replace(array("0","1","2","3","4","5","6","7","8","9"),
            array("零","一","二","三","四","五","六","七","八","九"), $num[$i]);
    }                                                     // 値は漢数字に変換する
    $res = array_reverse($res);
    for ($i = 0; $i < count($res); $i++) {
        $man = (count($res) - $i) % 8 == 2;                   // 万・億・兆の万進
        if($man){ /* do nothing */ }                    // 万進の場合は何もしない
        else if($res[$i] == "零"){ $res[$i + 1] = ""; }   // ゼロは単位を削除する
        else if($res[$i] == "一"){ $res[$i] = ""; }       // イチは値を省略する。
        if($res[$i] == "零"){ $res[$i] = ""; }        // ゼロは何れにせよ値を削除
        if($man && $i > 5 && implode(array_slice($res, $i - 6, 7)) == ""){
            $res[$i + 1] = "";                  // 兆億万が値無しで残らないように
        }
    }
    return implode($res);
}
?>