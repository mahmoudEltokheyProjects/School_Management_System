<?php

namespace App\Http\Livewire;

use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\ParentAttachment;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    // upload photos
    use WithFileUploads;

    public $description , $stock , $status = 1 ;
    // Success message
    public $successMessage = '' ;
    // Error message
    public $catchError;
    // Upload Files
    public $photos ;

    public $updateMode = false;
    // "Step" of "form wizard"
    public $currentStep = 1 ;
    // +++++++++++++++++++ Form Wizard Variables +++++++++++++++++++
    public
        // ------------- Father inputFields -------------
        $Email, $Password,
        $Name_Father, $Name_Father_en,
        $National_ID_Father, $Passport_ID_Father,
        $Phone_Father, $Job_Father, $Job_Father_en,
        $Nationality_Father_id, $Blood_Type_Father_id,
        $Address_Father, $Religion_Father_id,
        // ------------- Mother inputFields -------------
        $Name_Mother, $Name_Mother_en,
        $National_ID_Mother, $Passport_ID_Mother,
        $Phone_Mother, $Job_Mother, $Job_Mother_en,
        $Nationality_Mother_id, $Blood_Type_Mother_id,
        $Address_Mother, $Religion_Mother_id;
    // ------------- render() -------------
    public function render()
    {
        return view('livewire.add-parent',[
            "Nationalities" => Nationalitie::all() ,
            "Type_Bloods"   => Type_Blood::all()   ,
            "Religions"     => Religion::all() ,
        ]);
    }
    // +++++++++++++++ "Father" And "Mother" Form Validation : RealTime Validation ++++++++++++++++++++
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }
    // +++++++++++++++ firstStepSubmit() : Go To "Step 2" +++++++++++++++
    public function firstStepSubmit()
    {
        // Before Go To "Step 2" , Apply "Validation" on "InputFields"
        $this->validate([
            'Email' => 'required|unique:my__parents,Email,'.$this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my__parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my__parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);
        // Go To "Step 2" [ "Mother Form" ]
        $this->currentStep = 2;
    }
    // +++++++++++++++ secondStepSubmit() : Go To "Step 3" +++++++++++++++
    public function secondStepSubmit()
    {
        // Before Go To "Step 3" , Apply "Validation" on "InputFields"
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my__parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my__parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);
        // Go To "Step 3" [ "Confirmation Form" ]
        $this->currentStep = 3;
    }
    // +++++++++++++++ back() +++++++++++++++
    public function back($step)
    {
        $this->currentStep = $step;
    }
    // ++++++++++++++++++++++++++++++++ insert Data : submitForm() ++++++++++++++++++++++++++++++++
    public function submitForm()
    {
        try
        {
            $My_Parent = new My_Parent();
            // +++++++++++++++++ Step 1 : Father_INPUTS +++++++++++++++++
            $My_Parent->Email = $this->Email;
            $My_Parent->Password = Hash::make($this->Password);
            $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->National_ID_Father = $this->National_ID_Father;
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
            $My_Parent->Blood_Type_Father_id = $this->Blood_Type_Father_id;
            $My_Parent->Religion_Father_id = $this->Religion_Father_id;
            $My_Parent->Address_Father = $this->Address_Father;
            // +++++++++++++++++ Step 2 : Mother_INPUTS +++++++++++++++++
            $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $My_Parent->Blood_Type_Mother_id = $this->Blood_Type_Mother_id;
            $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
            $My_Parent->Address_Mother = $this->Address_Mother;
            $My_Parent->save();
            // -------------------------------- Attachments --------------------------------
            // Insert "Photos" in "Parent_Attachment" table
            if (!empty($this->photos))
            {
                foreach ($this->photos as $photo)
                {
                    // Store "photos" in "Storage Folder"
                    $photo->storeAs( $this->National_ID_Father,
                                     $photo->getClientOriginalName(),
                                     $disk = 'parent_attachments'
                                    );
                    // Store "photos" in "parent_attachments" Table in DB
                    ParentAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        // Get the "latest parent_id" from "my_parents" table
                        'parent_id' => My_Parent::latest()->first()->id,
                    ]);
                }
            }
            // -------------------------------- Success Message --------------------------------
            $this->successMessage = trans('messages.success');
            // -------------------------------- Clear Form Data --------------------------------
            // Execute clearForm() method : Clear "Data" of "inputFields"
            $this->clearForm();
            // -------------------------------- Go To "Step 1" --------------------------------
            $this->currentStep = 1;
        }
        catch (\Exception $e)
        {
            $this->catchError = $e->getMessage();
        };
    }
    // ++++++++++++++++++++++++++++++++ clearForm() : Clear inputFields ++++++++++++++++++++++++++++++++
    public function clearForm()
    {
        $this->Email = "";
        $this->Password = "";
        // Arabic "Name_Father" , English "Name_Father"
        $this->Name_Father_en = "";
        $this->Name_Father="";
        $this->National_ID_Father="";
        $this->Passport_ID_Father="";
        $this->Phone_Father="";
        // Arabic "Job_Father" , English "Job_Father"
        $this->Job_Father_en = "" ;
        $this->Job_Father = "";
        $this->Passport_ID_Father="";
        $this->Nationality_Father_id="";
        $this->Blood_Type_Father_id="";
        $this->Religion_Father_id="";
        $this->Address_Father="";
        // +++++++++++++++++ Step 2 : Mother_INPUTS +++++++++++++++++
        $this->Name_Mother_en = "" ;
        $this->Name_Mother="";
        $this->National_ID_Mother="";
        $this->Passport_ID_Mother="";
        $this->Phone_Mother="";
        $this->Job_Mother_en = "";
        $this->Job_Mother="";
        $this->Passport_ID_Mother="";
        $this->Nationality_Mother_id="";
        $this->Blood_Type_Mother_id="";
        $this->Religion_Mother_id="";
        $this->Address_Mother="";
    }
}
