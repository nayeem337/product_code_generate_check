<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code_generate extends Model
{
    use HasFactory;


    private static $code;

    public static function newCode($request, $quantity)
    {
        for ($i = 0; $i < $quantity; $i++) {
            $uniqueCode = self::generateCode();

            $codeInstance = new Code_generate();
            $codeInstance->product_id  = $request->product_id;
            $codeInstance->code        = $uniqueCode;
            $codeInstance->save();
        }
    }

    private static function generateCode()
    {
        return strtoupper(bin2hex(random_bytes(4)));
    }



    public static function updateCode($request, $id)
    {
        $codeInstance = Code_generate::find($id);

        if ($codeInstance) {

            $codeInstance->code       = $request->code;
            $codeInstance->save();
        } else {

            throw new \Exception("Code with ID $id not found.");
        }
    }

    public static function deleteCode($id)
    {
        $codeInstance = Code_generate::find($id);

        if ($codeInstance) {
            $codeInstance->delete();

        } else {
            throw new \Exception("Code with ID $id not found.");
        }
    }




}
