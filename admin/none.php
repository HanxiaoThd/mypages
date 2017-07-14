<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/5/11
 * Time: 23:13
 */
class All{
    public function __construct(){
        $this->str='';
    }
    public function fun($db,$table,$pid,$n=0){
        $sql="select * from $table WHERE parentid='$pid'";
        $resule=$db->query($sql);
        while($row=$resule->fetch_assoc()){
            $str=str_repeat('+',$n);
            $this->str.="<option value={$row['cid']}>{$str}{$row['catname']}</option>";
            $this->fun($db,$table,$row['cid'],$n+2);
        }
    }
    public function table($db,$table,$pid,$n=0){
        $sql="select * from $table WHERE parentid='$pid'";
        $resule=$db->query($sql);
//        var_dump($resule);
        while($row=$resule->fetch_assoc()){
            $str=str_repeat('+',$n);
            $this->str.="<tr>
                             <td>{$row['cid']}</td>
                             <td>{$str}{$row['catname']}</td>
                             <td>{$row['parentid']}</td>
                             <td><a href='qdellm.php?aa={$row['cid']}'>删除</a>
                                 <a href='qchangelm.php?aa={$row['cid']}'>编辑</a></td>
                        </tr>";
            $this->table($db,$table,$row['cid'],$n+2);
        }
    }
}
