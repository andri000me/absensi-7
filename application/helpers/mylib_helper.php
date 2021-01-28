<?php

function cmb_dinamis ($name, $query, $field, $pk, $selected=null, $extra=null){
    
    $ci =& get_instance();
    $cmb = "<select name='$name' class='custom-select' $extra>";
    $data = $ci->db->query($query)->result();
    foreach ($data as $row) {
        $cmb .= "<option value='".$row->$pk."'";
        $cmb .= $selected==$row->$pk?' selected':'';
        $cmb .= ">".$row->$field."</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}
