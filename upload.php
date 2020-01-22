        try{
            $path = public_path().'/uploads/'.date('Y-m-d');
            $file = $request->file('featured_image');
            if(!file_exists($path))
            {
                File::makeDirectory($path,0777,true);
            }
            $image = Image::make($file)->resize(500, 500);
            $newFileName = time().$file->getClientOriginalName();
            $newFileName = str_replace(' ','-',$newFileName);
            $image->save($path.'/'.$newFileName);
            $featuredImage = date('Y-m-d').'/'.$newFileName;



        }catch(Exception $exception){
            toastr()->error("Error while storing image in server.")->danger();
            return redirect()->back();
        }
