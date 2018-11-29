<?php


// Settings -----------------------------------------------
if (! function_exists('settings_get')) {
    function settings_get($name) {
        return \App\Settings::where('name', $name)->first();
    }
}
if (! function_exists('settings_get_val')) {
    function settings_get_val($name) {
        return \App\Settings::where('name', $name)->first()->value;
    }
}

// Code Family -----------------------------------------------
if (! function_exists('family_new_code')) {
    function family_new_code() {
        $res = \App\Family::whereRaw('code = (select max(`code`) from family)')->first();
        if($res)
            return $res->code+1;
        return 1;
    }
}
if (! function_exists('family_new_code_format')) {
    function family_new_code_format() {
        $res = \App\Family::whereRaw('code = (select max(`code`) from family)')->first();
        $number = 1;
        if($res)
            $number = $res->code+1;
        $template = settings_get_val('default_family_code');
        $template = str_replace('[YYYY]',date("Y"),$template);
        $template = str_replace('[YY]',date("y"),$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);

        return $template;
    }
}
if (! function_exists('get_code_family')) {
    function get_code_family($familyid) {
        $res = \App\Family::findOrFail($familyid);
        if($res)
            return $res->code;

        return 0;
    }
}

if (! function_exists('family_get_code')) {
    function family_get_code($familyid) {
        $res = \App\Family::where('id', $familyid)->first();
        if(!$res)
            return '';
        $number = $res->code;
        $date = explode('-',$res->date_subscribe);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_family_code');
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
if (! function_exists('family_get_code_by_data')) {
    function family_get_code_by_data($date,$number) {
        $date = explode('-',$date);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_family_code');
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
//Code Parent---------------------------------------------------------------
if (! function_exists('parrent_new_code')) {
    function parrent_new_code() {
        $res = \App\Parrent::whereRaw('code = (select max(`code`) from parent)')->first();
        if($res)
            return $res->code+1;
        return 1;
    }
}

if (! function_exists('parent_new_code_format')) {
    function parent_new_code_format($codeFamily) {
        $res = \App\Parrent::whereRaw('code = (select max(`code`) from parent)')->first();
        $number = 1;
        if($res)
            $number = $res->code+1;
        $template = settings_get_val('default_parent_code');
        $template = str_replace('[FAMILY]', $codeFamily, $template);
        $template = str_replace('[YYYY]',date("Y"),$template);
        $template = str_replace('[YY]',date("y"),$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);

        return $template;
    }
}
if (! function_exists('parrent_get_code')) {
    function parrent_get_code($parrentid) {
        $res = \App\Parrent::findOrFail($parrentid);
        if(!$res)
            return '';
        $number = $res->code;
        $date = explode('-',$res->date_subscribe);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_parent_code');
        $template = str_replace('[FAMILY]', family_get_code($res->family_id), $template);
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
if (! function_exists('parent_get_code_by_data')) {
    function parent_get_code_by_data($date,$number, $codeFamily) {
        $date = explode('-',$date);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_parent_code');
        $template = str_replace('[FAMILY]', $codeFamily, $template);
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
//Code Parrain---------------------------------------------------------------
if (! function_exists('parrain_new_code')) {
    function parrain_new_code() {
        $res = \App\Parrain::whereRaw('code = (select max(`code`) from parrain)')->first();
        if($res)
            return $res->code+1;
        return 1;
    }
}

if (! function_exists('parrain_get_code')) {
    function parrain_get_code($parrainid) {
        $res = \App\Parrain::findOrFail($parrainid);

        $number = $res->code;
        $date = explode('-',$res->date_subscribe);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_parrain_code');
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}

if (! function_exists('parrain_get_code_by_data')) {
    function parrain_get_code_by_data($date, $number) {

        $date = explode('-',$date);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_parrain_code');
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}

//Code Child---------------------------------------------------------------
if (! function_exists('child_new_code')) {
    function child_new_code() {
        $res = \App\Child::whereRaw('code = (select max(`code`) from child)')->first();
        if($res)
            return $res->code+1;

        return 1;
    }
}
if (! function_exists('child_new_code_format')) {
    function child_new_code_format($codeFamily) {
        $res = \App\Child::whereRaw('code = (select max(`code`) from child)')->first();
        $number = 1;
        if($res)
            $number = $res->code+1;
        $template = settings_get_val('default_child_code');
        $template = str_replace('[FAMILY]', $codeFamily, $template);
        $template = str_replace('[YYYY]',date("Y"),$template);
        $template = str_replace('[YY]',date("y"),$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);

        return $template;
    }
}
if (! function_exists('child_get_code')) {
    function child_get_code($childid) {
        $res = \App\Child::where('id', $childid)->first();
        if(!$res)
            return '';
        $number = $res->code;
        $date = explode('-',$res->created_at);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_child_code');
        $template = str_replace('[FAMILY]', family_get_code($res->family_id), $template);
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
if (! function_exists('child_get_code_by_data')) {
    function child_get_code_by_data($date, $number, $family_id) {

        $date = explode('-',$date);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_child_code');
        $template = str_replace('[FAMILY]', family_get_code($family_id), $template);
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
if (! function_exists('child_get_code_by_data_format')) {
    function child_get_code_by_data_format($date, $number, $formatFamily) {

        $date = explode('-',$date);
        $yyyy = $date[0];
        $yy = substr($date[0], -2);
        $template = settings_get_val('default_child_code');
        $template = str_replace('[FAMILY]', $formatFamily, $template);
        $template = str_replace('[YYYY]',$yyyy,$template);
        $template = str_replace('[YY]',$yy,$template);
        $template = str_replace('99999',str_pad($number, 5, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9999',str_pad($number, 4, "0", STR_PAD_LEFT),$template);
        $template = str_replace('999',str_pad($number, 3, "0", STR_PAD_LEFT),$template);
        $template = str_replace('99',str_pad($number, 2, "0", STR_PAD_LEFT),$template);
        $template = str_replace('9',str_pad($number, 1, "0", STR_PAD_LEFT),$template);
        return $template;
    }
}
// Date format -------------------------------------------------------------
if (! function_exists('format_date_to_db')) {
    function format_date_to_db($date) {
        if(!$date)
            return '';
        return date('Y-m-d',strtotime(str_replace('/','-',$date)));
    }
}
if (! function_exists('format_date_to_view')) {
    function format_date_to_view($date) {
        if(!$date)
            return '';
        return date('d/m/Y',strtotime($date));
    }
}

// Permissions -------------------------------------------------------------
if (! function_exists('has_permission_slug')) {
    function has_permission_slug($slug) {
        $role_id = 0;
        if(Auth::user()){
            $role_id = Auth::user()->role_id;
        }else{
            return false;
        }
        if($role_id == 1)//Superadmin
            return true;
        $permission = \App\Role::find($role_id)->hasPermissionsSlug($slug);
        if($permission != null){
            if($permission->status == 1){
                return true;
            }
        }
        return false;
    }
}

// Delete Folder Recursively -------------------------------------------------------------
if (! function_exists('delete_folder')) {
    function delete_folder($dir) {
        if(!is_dir($dir))
            return false;
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? recurseRmdir("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}

// Parainage -------------------------------------------------------------
if (! function_exists('periodic_payment_label')) {
    function periodic_payment_label($periodic_payment)
    {
        $result = '';
        if ($periodic_payment == 1) {
            $result = __('parrain.annuel');
        } else if ($periodic_payment == 2) {
            $result = __('parrain.semestriel');
        } else if ($periodic_payment == 3) {
            $result = __('parrain.trimestriel');
        } else if ($periodic_payment == 4) {
            $result = __('parrain.mensuel');
        } else if ($periodic_payment == 5) {
            $result = __('parrain.irrégulier');
        }
        return $result;
    }
}
if (! function_exists('type_payment_label')) {
    function type_payment_label($type_payment)
    {
        $result = '';
        if ($type_payment == 1) {//Virement mensuel du compte postal
            $result = __('parrain.virement_mensuel');
        } else if ($type_payment == 2) {//conversion du compte postal
            $result = __('parrain.conversion_postal');
        } else if ($type_payment == 3) {//Cash
            $result = __('parrain.cash');
        } else if ($type_payment == 4) {//Chèque postal ou bancaire
            $result = __('parrain.cheque');
        }
        return $result;
    }
}

//------------------------------------------------------------------------------------------------------------------
if (! function_exists('compare_after_update')) {
    function compare_after_update($old_, $new_, $localisation)
    {
        if (!$new_)
            return '';
        $msg = '';
        if (strcmp($old_->adress, $new_->adress) != 0)
            $msg .= ',famille.adresse:' . elimine_separat($old_->adress) . ';' . elimine_separat($new_->adress);

        if ($old_->state_id != $new_->state_id)
            $msg .= ',famille.gouvernorat:' . 'global.' . elimine_separat($old_->state->name) . ';' . 'global.' . elimine_separat($new_->state->name);

        if ($old_->town_id != $new_->town_id)
            $msg .= ',famille.delegation:' . 'global.' . elimine_separat($old_->town->name) . ';' . 'global.' . elimine_separat($new_->town->name);

        if ($old_->city_id != $new_->city_id)
            $msg .= ',famille.city:' . 'global.' . elimine_separat($old_->city->name) . ';' . 'global.' . elimine_separat($new_->city->name);

        if ($localisation) {
            if (round($old_->lat, 10) != round($new_->lat, 10))
                $msg .= ',famille.latitude:' . $old_->lat . ';' . $new_->lat;

            if (round($old_->lng, 10) != round($new_->lng, 10))
                $msg .= ',famille.longitude:' . $old_->lng . ';' . $new_->lng;
        }

        return $msg;
    }
}

if (! function_exists('elimine_separat')) {
    function elimine_separat($str)
    {
        return str_replace(array('.', ',', ':', ';'), ' ', $str);
    }
}

if (! function_exists('get_storage_file')) {
    function get_storage_file($path)
    {
        $full_path = Storage::path($path);
        $base64 = base64_encode(Storage::get($path));
        $image_data = 'data:' . mime_content_type($full_path) . ';base64,' . $base64;
        return $image_data;
    }
}

if (! function_exists('get_base64_file')) {
    function get_base64_file($path)
    {
        return base64_encode(Storage::get($path));
    }
}

if (! function_exists('get_type_file')) {
    function get_type_file($path)
    {
        return mime_content_type(Storage::path($path));
    }
}

if (! function_exists('format_montant')) {
    function format_montant($montant, $devise='dt', $virgule=3)
    {
        return number_format($montant, $virgule, ',', '').' '.__('user.'.$devise, array(), auth()->user()->language->ref);
    }
}
