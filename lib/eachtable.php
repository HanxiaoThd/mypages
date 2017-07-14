<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/5/12
 * Time: 9:21
 */
class All{
    public function __construct(){
        $this->str='';
    }
    public function fun($db,$table,$pid,$n=0){
        $sql="select * FROM  {$table} WHERE pid={$pid}";
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $str=str_repeat('+',$n);
            $this->str.="<option value={$row['id']}>{$str}{$row['tablename']}</option>";
            $this->fun($db,$table,$row['id'],$n+2);
        }
    }
    public function table($db,$table,$pid,$n=0){
        $sql="select * from $table WHERE pid='{$pid}'";
        $result=$db->query($sql);
        while ($row=$result->fetch_assoc()){
            $str=str_repeat('+',$n);
            $this->str.="<ul>           
                         <li>{$str}{$row['tablename']}
                       
                         <a href='delCategory.php?id={$row['id']}'>删除</a>
                             <a href='editCategory.php?id={$row['id']}'>编辑</a></li><br>
                </ul>";
                         $this->table($db,$table,$row['id'],$n+2);
        }
    }
}
class All1{
    public function __construct(){
        $this->str='';
    }
    public function fun($db,$table,$pid,$cid,$n=0){
        $sql="select * FROM  {$table} WHERE pid={$pid}";
        //首先查询当前pid
        $result=$db->query($sql);
        while($row=$result->fetch_assoc()){
            $str=str_repeat('+',$n);
            echo $row['id']."+".$cid."-";
            if ($row['id']==$cid){
                $this->str.="<option value={$cid} selected>{$str}{$row['tablename']}</option>";
            }else{
                $this->str.="<option value={$row['id']}>{$str}{$row['tablename']}</option>";
            }
            $this->fun($db,$table,$row['id'],$cid,$n+2);
        }
    }
    public function listTree($db,$table,$pid,$n=0){
        $sql="select * FROM  {$table} WHERE pid={$pid}";
        //首先查询当前pid
        $result=$db->query($sql);
//        查询结果集
        while($row=$result->fetch_assoc()){
//            如果有结果集
            $str=str_repeat('+',$n);
//            在标题之前添加标识，标识为几级标题
            $id=$row["id"];
//            获取当前
            $sql="select * from {$table} WHERE pid=".$id;
            $re=$db->query($sql);
            $catname=$row["tablename"];
            if(mysqli_num_rows($re)>0){
                $this->str.="<span>{$str}{$catname}</span><br>";
            }else{
                $this->str.="<a href='show.php?id={$id}' target='show'>{$str}{$catname}</a><br>";
            }
            $this->listTree($db,$table,$id,$n+2);
        };
    }
}