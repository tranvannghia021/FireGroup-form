<?php
namespace App\Http\Services;
use App\Models\Contacts;
use Illuminate\Support\Facades\DB;

class ContactService{
    public function getAll(){
        //orm
       //return Contacts::orderBy('id', 'DESC')->get();
       // raw
      return DB::select('SELECT *, ROUND(DATEDIFF(CURDATE(), dateofbirth) / 365, 0) AS olds FROM contacts ORDER BY id DESC ');
    }
    public function getId($id){
        //return Contacts::where('id',$id)->get();
        return DB::select('SELECT * FROM contacts WHERE id=?',[$id]);
    
     }
    public function update($request,$id){
        try {
            // Contacts::where('id',$id)->update([
            //     'name'=>$request->input('name'),
            //     'address'=>$request->input('address'),
            //     'phone'=>$request->input('phone'),
            //     'dateofbirth'=>$request->input('date_birh'),
            // ]);
            DB::update('UPDATE contacts SET name = ?,address = ?,phone = ?,dateofbirth = ? WHERE id = ?',
             [
                 $request->input('name'),
                 $request->input('address'),
                 $request->input('phone'),
                 $request->input('date_birh'),
                 $id
                ]);
        } catch (\Exception $error) {
            return false;
            
        }
        return true;
    }
    public function delete($id){
        try {
            // $result=Contacts::find($id);
            // if($result)
            //     $result->delete();
            if(!is_null($this->getId($id))){

                DB::delete('DELETE FROM contacts WHERE id = ? ', [$id]);
            }
            
            
        } catch (\Exception $error) {
            return false;
            
        }
        return true;
    }
    public function create($request){
        try {
            // Contacts::create([
            //     'name'=>$request->input('name'),
            //     'address'=>$request->input('address'),
            //     'phone'=>$request->input('phone'),
            //     'dateofbirth'=>$request->input('date_birh'),
            // ]);
            DB::insert('INSERT INTO contacts ( name,address,phone,dateofbirth) VALUES (?, ?,?,?)', [
                $request->input('name'),
                $request->input('address'),
                $request->input('phone'),
                $request->input('date_birh'),
            ]);

        } catch (\Exception $error) {
            return false;
            
        }
        return true;
    }
    public function filter($request){
        $query='WHERE 1 ';
        if(!is_null($request->input('name')))
            $query.='AND name LIKE \'%'.$request->input('name').'%\' ';
        if(!is_null($request->input('phone')))
            $query.=' AND phone LIKE \'%'.$request->input('phone').'%\' ';
        if(!is_null($request->input('old-start')) && !is_null($request->input('old-end'))){
            $query.=' AND YEAR(dateofbirth) <= "'.$this->handleOld_to_year($request->input('old-start')).'"';
            $query.=' AND YEAR(dateofbirth) >= "'.$this->handleOld_to_year($request->input('old-end')).'"';
        }
      return DB::select('SELECT *,ROUND(DATEDIFF(CURDATE(), dateofbirth) / 365, 0) AS olds FROM contacts '.$query.'');
    }
    public function handleOld_to_year($old){
        $years=date('Y') - $old;
        return $years;
    }
    
}