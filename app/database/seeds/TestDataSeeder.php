<?php

class TestDataSeeder extends DatabaseSeeder
{
    public function run()
    {
        /* DISTRICT table */
        $districtsData = array(
            array("id" => \Config::get('constants.DISTRICT_ID'), 
                'name' => \Config::get('constants.DISTRICT_NAME')
                ),
            
        );

        foreach ($districtsData as $district)
        {
            $districts[] = District::create($district);
        }
        $this->command->info('Districts seeded');


        /* Facility Ownership table */
        $facilityownershipsData = array(
            array("owner" => "Public"),
            array("owner" => "PFP"),
            array("owner" => "PNFP"),
            array("owner" => "Other"),
            
        );

        foreach ($facilityownershipsData as $facilityownership)
        {
            $facilityownerships[] = UNHLSFacilityOwnership::create($facilityownership);
        }
        $this->command->info('Facility Ownerships seeded');

        
        /* Facility Levels table */
        $facilitylevelsData = array(
            array("level" => "Public NRH"),
            array("level" => "Public RRH"),
            array("level" => "Public GH"),
            array("level" => "Public HCIV"),
            array("level" => "Public HCIII"),
            array("level" => "Private Level 3"),
            array("level" => "Private Level 2"),
            array("level" => "Private Level 1"),
        );

        foreach ($facilitylevelsData as $facilitylevel)
        {
            $facilitylevels[] = UNHLSFacilityLevel::create($facilitylevel);
        }
        $this->command->info('Facility Levels seeded');


        /* Facility table */
        $facilitysData = array(
            array("id" => \Config::get('constants.FACILITY_ID'),
                'name' => \Config::get('constants.FACILITY_NAME'),
                'district_id' => \Config::get('constants.DISTRICT_ID'),
                'code' => \Config::get('constants.FACILITY_CODE'),
                'level_id' => \Config::get('constants.FACILITY_LEVEL_ID'),
                'ownership_id' => \Config::get('constants.FACILITY_OWNERSHIP_ID')
                ),
        );

        foreach ($facilitysData as $facility)
        {
            $facilitys[] = UNHLSFacility::create($facility);
        }
        $this->command->info('Facility seeded');


        /* Users table */
        $usersData = array(
            array(
                "username" => "administrator", "password" => Hash::make("password"),
                "email" => "", "name" => "A-LIS Admin", "designation" => "Programmer",
                "facility_id" => \Config::get('constants.FACILITY_ID')
            ),
        );

        foreach ($usersData as $user)
        {
            $users[] = User::create($user);
        }
        $this->command->info('users seeded');



        /* BB Actions table */
        $bbactionsData = array(
            array("actionname" => "Reported to administration for further action"),
			array("actionname" => "Referred to mental department"),
			array("actionname" => "Gave first aid (e.g. arrested bleeding)"),
			array("actionname" => "Referred to clinician for further management"),
            array("actionname" => "Conducted risk assessment"),
            array("actionname" => "Intervened to interrupt/arrest progress of incident (e.g. Used neutralizing agent, stopping a fight)"),
            array("actionname" => "Disposed off broken container to designated waste bin/sharps"),
            array("actionname" => "Patient sample taken & referred to testing lab Isolated suspected patient"),
            array("actionname" => "Reported to or engaged national level BRM for intervention"),
            array("actionname" => "Victim counseled"),
            array("actionname" => "Contacted Police"),
            array("actionname" => "Used spill kit"),
            array("actionname" => "Administered PEP"),
            array("actionname" => "Referred to disciplinary committee"),
            array("actionname" => "Contained the spillage"),
            array("actionname" => "Disinfected the place"),
            array("actionname" => "Switched off the Electricity Mains"),
            array("actionname" => "Washed punctured area"),
            array("actionname" => "Others"),
        );

        foreach ($bbactionsData as $bbaction)
        {
            $bbactions[] = BbincidenceAction::create($bbaction);
        }
        $this->command->info('BB Actions seeded');
		
		
		/* BB Causes table */
        $bbcausesData = array(
			array("causename" => "Defective Equipment"),
			array("causename" => "Hazardous Chemicals"),
			array("causename" => "Unsafe Procedure"),
			array("causename" => "Psychological causes (e.g. emotional condition, depression, mental confusion)"),
            array("causename" => "Unsafe storage of laboratory chemicals"),
            array("causename" => "Lack of Skill or Knowledge"),
            array("causename" => "Lack of Personal Protective Equipment"),
            array("causename" => "Unsafe Working Environment"),
            array("causename" => "Lack of Adequate Physical Security"),
            array("causename" => "Unsafe location of laboratory equipment"),
            array("causename" => "Other"),
        );

        foreach ($bbcausesData as $bbcause)
        {
            $bbcauses[] = BbincidenceCause::create($bbcause);
        }
        $this->command->info('BB Causes seeded');
		
		/* BB Natures table */
        $bbnaturesData = array(
            array("name"=>"Assault/Fight among staff","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Fainting","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Roof leakages","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Machine cuts/bruises","class"=>"Mechanical","priority"=>"Minor"),
            array("name"=>"Electric shock/burn","class"=>"Mechanical","priority"=>"Major"),
            array("name"=>"Death within lab","class"=>"Ergonometric and Medical","priority"=>"Major"),
            array("name"=>"Slip or fall","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Unnecessary destruction of lab material","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Theft of laboratory consumables","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Breakage of sample container","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Prick/cut by unused sharps","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Injury caused by laboratory objects","class"=>"Physical","priority"=>"Minor"),
            array("name"=>"Chemical burn","class"=>"Chemical","priority"=>"Minor"),
            array("name"=>"Theft of chemical","class"=>"Chemical","priority"=>"Minor"),
            array("name"=>"Chemical spillage","class"=>"Chemical","priority"=>"Major"),
            array("name"=>"Theft of equipment","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Attack on the Lab","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Collapsing building","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Bike rider accident","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Fire","class"=>"Physical","priority"=>"Major"),
            array("name"=>"Needle prick or cuts by used sharps","class"=>"Biological","priority"=>"Minor"),
            array("name"=>"Sample spillage","class"=>"Biological","priority"=>"Minor"),
            array("name"=>"Theft of samples","class"=>"Biological","priority"=>"Major"),
            array("name"=>"Contact with VHF suspect","class"=>"Biological","priority"=>"Major"),
            array("name"=>"Contact with radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Theft of radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Poor disposal of radiological materials","class"=>"Radiological","priority"=>"Major"),
            array("name"=>"Poor vision from inadequate light","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Back pain from posture effects","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Other occupational hazard","class"=>"Ergonometric and Medical","priority"=>"Minor"),
            array("name"=>"Other","class"=>"Other","priority"=>"Other"),
        );

        foreach ($bbnaturesData as $bbnature)
        {
            $bbnatures[] = BbincidenceNature::create($bbnature);
        }
        $this->command->info('BB Natures seeded');
        

       
        /* Specimen Types table */
        $specTypesData = array(
            array("name" => "Ascitic Tap"),
            array("name" => "Aspirate"),
            array("name" => "CSF"),
            array("name" => "Dried Blood Spot"),
            array("name" => "High Vaginal Swab"),
            array("name" => "Nasal Swab"),
            array("name" => "Plasma"),
            array("name" => "Plasma EDTA"),
            array("name" => "Pleural Tap"),
            array("name" => "Pus Swab"),
            array("name" => "Rectal Swab"),
            array("name" => "Semen"),
            array("name" => "Serum"),
            array("name" => "Skin"),
            array("name" => "Vomitus"),
            array("name" => "Stool"),
            array("name" => "Synovial Fluid"),
            array("name" => "Throat Swab"),
            array("name" => "Urethral Smear"),
            array("name" => "Urine"),
            array("name" => "Vaginal Smear"),
            array("name" => "Water"),
            array("name" => "Whole Blood"),
        );

        foreach ($specTypesData as $specimenType)
        {
            $specTypes[] = SpecimenType::create($specimenType);
        }
        $this->command->info('specimen_types seeded');
        
        /* Test Categories table - These map on to the lab sections */
        $test_categories = TestCategory::create(array("name" => "PARASITOLOGY","description" => ""));
        $lab_section_microbiology = TestCategory::create(array("name" => "MICROBIOLOGY","description" => ""));

        $this->command->info('test_categories seeded');
        
        
        /* Measure Types */
        $measureTypes = array(
            array("id" => "1", "name" => "Numeric Range"),
            array("id" => "2", "name" => "Alphanumeric Values"),
            array("id" => "3", "name" => "Autocomplete"),
            array("id" => "4", "name" => "Free Text")
        );

        foreach ($measureTypes as $measureType)
        {
            MeasureType::create($measureType);
        }
        $this->command->info('measure_types seeded');
                
        /* Measures table */
        $measureBSforMPS = Measure::create(
            array("measure_type_id" => "2",
                "name" => "BS for mps", 
                "unit" => ""));
        $measure1 = Measure::create(array("measure_type_id" => "2", "name" => "Grams stain", "unit" => ""));
        $measure2 = Measure::create(array("measure_type_id" => "2", "name" => "SERUM AMYLASE", "unit" => ""));
        $measure3 = Measure::create(array("measure_type_id" => "2", "name" => "calcium", "unit" => ""));
        $measure4 = Measure::create(array("measure_type_id" => "2", "name" => "SGOT", "unit" => ""));
        $measure5 = Measure::create(array("measure_type_id" => "2", "name" => "Indirect COOMBS test", "unit" => ""));
        $measure6 = Measure::create(array("measure_type_id" => "2", "name" => "Direct COOMBS test", "unit" => ""));
        $measure7 = Measure::create(array("measure_type_id" => "2", "name" => "Du test", "unit" => ""));
        
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "No mps seen", "interpretation" => "Negative"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "+", "interpretation" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "++", "interpretation" => "Positive"));
        MeasureRange::create(array("measure_id" => $measureBSforMPS->id, "alphanumeric" => "+++", "interpretation" => "Positive"));
        
        MeasureRange::create(array("measure_id" => $measure1->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure1->id, "alphanumeric" => "Positive"));

        MeasureRange::create(array("measure_id" => $measure2->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measure2->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measure2->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measure3->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measure3->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measure3->id, "alphanumeric" => "Normal"));

        MeasureRange::create(array("measure_id" => $measure4->id, "alphanumeric" => "High"));
        MeasureRange::create(array("measure_id" => $measure4->id, "alphanumeric" => "Low"));
        MeasureRange::create(array("measure_id" => $measure4->id, "alphanumeric" => "Normal"));
        
        MeasureRange::create(array("measure_id" => $measure5->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure5->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measure6->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure6->id, "alphanumeric" => "Negative"));

        MeasureRange::create(array("measure_id" => $measure7->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure7->id, "alphanumeric" => "Negative"));
        $measures = array(
            array("measure_type_id" => "1", "name" => "URIC ACID", "unit" => "mg/dl"),
            array("measure_type_id" => "4", "name" => "CSF for biochemistry", "unit" => ""),
            array("measure_type_id" => "4", "name" => "PSA", "unit" => ""),
            array("measure_type_id" => "1", "name" => "Total", "unit" => "mg/dl"),
            array("measure_type_id" => "1", "name" => "Alkaline Phosphate", "unit" => "u/l"),
            array("measure_type_id" => "1", "name" => "Direct", "unit" => "mg/dl"),
            array("measure_type_id" => "1", "name" => "Total Proteins", "unit" => ""),
            array("measure_type_id" => "4", "name" => "LFTS", "unit" => "NULL"),
            array("measure_type_id" => "1", "name" => "Chloride", "unit" => "mmol/l"),
            array("measure_type_id" => "1", "name" => "Potassium", "unit" => "mmol/l"),
            array("measure_type_id" => "1", "name" => "Sodium", "unit" => "mmol/l"),
            array("measure_type_id" => "4", "name" => "Electrolytes", "unit" => ""),
            array("measure_type_id" => "1", "name" => "Creatinine", "unit" => "mg/dl"),
            array("measure_type_id" => "1", "name" => "Urea", "unit" => "mg/dl"),
            array("measure_type_id" => "4", "name" => "RFTS", "unit" => ""),
            array("measure_type_id" => "4", "name" => "TFT", "unit" => ""),
        );

        foreach ($measures as $measure)
        {
            Measure::create($measure);
        }
        $measureGXM = Measure::create(array("measure_type_id" => "4", "name" => "GXM", "unit" => ""));
        $measureBG = Measure::create(
            array("measure_type_id" => "2",
                "name" => "Blood Grouping", 
                "unit" => ""));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "O-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "O+"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "A-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "A+"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "B-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "B+"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "AB-"));
        MeasureRange::create(array("measure_id" => $measureBG->id, "alphanumeric" => "AB+"));        
        $measureHB = Measure::create(array("measure_type_id" => Measure::NUMERIC, "name" => "HB", 
            "unit" => "g/dL"));

        $measuresUrinalysisData = array(
            array("measure_type_id" => "4", "name" => "Urine microscopy", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Pus cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "S. haematobium", "unit" => ""),
            array("measure_type_id" => "4", "name" => "T. vaginalis", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Yeast cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Red blood cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Bacteria", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Spermatozoa", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Epithelial cells", "unit" => ""),
            array("measure_type_id" => "4", "name" => "ph", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Urine chemistry", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Glucose", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Ketones", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Proteins", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Blood", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Bilirubin", "unit" => ""),
            array("measure_type_id" => "4", "name" => "Urobilinogen Phenlpyruvic acid", "unit" => ""),
            array("measure_type_id" => "4", "name" => "pH", "unit" => "")
            );

        foreach ($measuresUrinalysisData as $measureU) {
            $measuresUrinalysis[] = Measure::create($measureU);
        }

        $measuresWBCData = array(
            array("measure_type_id" => Measure::NUMERIC, "name" => "WBC", 
                "unit" => "x10³/µL"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Lym", "unit" => "L"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Mon", "unit" => "*"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Neu", "unit" => "*"),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Eos", "unit" => ""),
            array("measure_type_id" => Measure::NUMERIC, "name" => "Baso", "unit" => ""),
            );

        foreach ($measuresWBCData as $value) {
            $measuresWBC[] = Measure::create($value);
        }

        $measureRangesWBC = array(
            array("measure_id" => $measuresWBC[0]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 4, "range_upper" => 11),
            array("measure_id" => $measuresWBC[1]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 1.5, "range_upper" => 4),
            array("measure_id" => $measuresWBC[2]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 0.1, "range_upper" => 9),
            array("measure_id" => $measuresWBC[3]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 2.5, "range_upper" => 7),
            array("measure_id" => $measuresWBC[4]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 0, "range_upper" => 6),
            array("measure_id" => $measuresWBC[5]->id, "age_min" => 0, "age_max" => 100, "gender" => MeasureRange::BOTH,
                "range_lower" => 0, "range_upper" => 2),
            );

        foreach ($measureRangesWBC as $value) {
            MeasureRange::create($value);
        }

        $this->command->info('measures seeded');
        
        /* Test Types table */
        $testTypeBS = TestType::create(array("name" => "BS for mps", "test_category_id" => $test_categories->id, "orderable_test" => 1));
        $testTypeStoolCS = TestType::create(array("name" => "Stool for C/S", "test_category_id" => $lab_section_microbiology->id));
        $testTypeGXM = TestType::create(array("name" => "GXM", "test_category_id" => $test_categories->id));
        $testTypeHB = TestType::create(array("name" => "HB", "test_category_id" => $test_categories->id, "orderable_test" => 1));
        $testTypeUrinalysis = TestType::create(array("name" => "Urinalysis", "test_category_id" => $test_categories->id));
        $testTypeWBC = TestType::create(array("name" => "WBC", "test_category_id" => $test_categories->id));

        $this->command->info('test_types seeded');

        /* TestType Measure table */
        TestTypeMeasure::create(array("test_type_id" => $testTypeBS->id, "measure_id" => $measureBSforMPS->id));
        TestTypeMeasure::create(array("test_type_id" => $testTypeGXM->id, "measure_id" => $measureGXM->id));
        TestTypeMeasure::create(array("test_type_id" => $testTypeGXM->id, "measure_id" => $measureBG->id));
        TestTypeMeasure::create(array("test_type_id" => $testTypeHB->id, "measure_id" => $measureHB->id));

        foreach ($measuresUrinalysis as $value) {
            TestTypeMeasure::create(array("test_type_id" => $testTypeUrinalysis->id, "measure_id" => $value->id));
        }

        foreach ($measuresWBC as $value) {
            TestTypeMeasure::create(array("test_type_id" => $testTypeWBC->id, "measure_id" => $value->id));
        }

        $this->command->info('testtype_measures seeded');

        /* testtype_specimentypes table */
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeBS->id, "specimen_type_id" => $specTypes[count($specTypes)-1]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeGXM->id, "specimen_type_id" => $specTypes[count($specTypes)-1]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specTypes[count($specTypes)-1]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specTypes[6]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specTypes[7]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeHB->id, "specimen_type_id" => $specTypes[12]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeUrinalysis->id, "specimen_type_id" => $specTypes[19]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeUrinalysis->id, "specimen_type_id" => $specTypes[20]->id));
        DB::table('testtype_specimentypes')->insert(
            array("test_type_id" => $testTypeWBC->id, "specimen_type_id" => $specTypes[count($specTypes)-1]->id));

        $this->command->info('testtype_specimentypes seeded');

        /* Patients table */
        $patients_array = array(
            array("name" => "Jam Felicia", "email" => "fj@x.com", "patient_number" => "1002", "dob" => "2000-01-01", "gender" => "1", "created_by" => "2"),
            array("name" => "Emma Wallace", "email" => "emma@snd.com", "patient_number" => "1003", "dob" => "1990-03-01", "gender" => "1", "created_by" => "2"),
            array("name" => "Jack Tee", "email" => "info@jt.co.ke", "patient_number" => "1004", "dob" => "1999-12-18", "gender" => "0", "created_by" => "1"),
            array("name" => "Hu Jintao", "email" => "hu@.un.org", "patient_number" => "1005", "dob" => "1956-10-28", "gender" => "0", "created_by" => "2"),
            array("name" => "Lance Opiyo", "email" => "lance@x.com", "patient_number" => "2150", "dob" => "2012-01-01", "gender" => "0", "created_by" => "1"));
        foreach ($patients_array as $pat) {
            $patients[] = UnhlsPatient::create($pat);
        }

        $this->command->info('patients seeded');

        /* Test Phase table */
        $test_phases = array(
          array("id" => "1", "name" => "Pre-Analytical"),
          array("id" => "2", "name" => "Analytical"),
          array("id" => "3", "name" => "Post-Analytical")
        );
        foreach ($test_phases as $test_phase)
        {
            TestPhase::create($test_phase);
        }
        $this->command->info('test_phases seeded');

        /* Test Status table */
        $test_statuses = array(
          array("id" => "1","name" => "not-received","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "2","name" => "pending","test_phase_id" => "1"),//Pre-Analytical
          array("id" => "3","name" => "started","test_phase_id" => "2"),//Analytical
          array("id" => "4","name" => "completed","test_phase_id" => "3"),//Post-Analytical
          array("id" => "5","name" => "verified","test_phase_id" => "3"),//Post-Analytical
          array("id" => "6","name" => "specimen-rejected-at-analysis","test_phase_id" => "3")//Analytical
        );
        foreach ($test_statuses as $test_status)
        {
            TestStatus::create($test_status);
        }
        $this->command->info('test_statuses seeded');

        /* Specimen Status table */
        $specimen_statuses = array(
          array("id" => "1", "name" => "specimen-not-collected"),//Pre-Analytical
          array("id" => "2", "name" => "specimen-accepted"),//Pre-Analytical
          array("id" => "3", "name" => "specimen-rejected")//Pre-Analytical
        );
        foreach ($specimen_statuses as $specimen_status)
        {
            SpecimenStatus::create($specimen_status);
        }
        $this->command->info('specimen_statuses seeded');

        /* Visits table */
        
        for ($i=0; $i < 7; $i++) { 
            $visits[] = UnhlsVisit::create(array("patient_id" => $patients[rand(0,count($patients)-1)]->id));
        }
        $this->command->info('visits seeded');

        /* Rejection Reasons table */
        $rejection_reasons_array = array(
          array("reason" => "Poorly labelled"),
          array("reason" => "Over saturation"),
          array("reason" => "Insufficient Sample"),
          array("reason" => "Scattered"),
          array("reason" => "Clotted Blood"),
          array("reason" => "Two layered spots"),
          array("reason" => "Serum rings"),
          array("reason" => "Scratched"),
          array("reason" => "Haemolysis"),
          array("reason" => "Spots that cannot elute"),
          array("reason" => "Leaking"),
          array("reason" => "Broken Sample Container"),
          array("reason" => "Mismatched sample and form labelling"),
          array("reason" => "Missing Labels on container and tracking form"),
          array("reason" => "Empty Container"),
          array("reason" => "Samples without tracking forms"),
          array("reason" => "Poor transport"),
          array("reason" => "Lipaemic"),
          array("reason" => "Wrong container/Anticoagulant"),
          array("reason" => "Request form without samples"),
          array("reason" => "Missing collection date on specimen / request form."),
          array("reason" => "Name and signature of requester missing"),
          array("reason" => "Mismatched information on request form and specimen container."),
          array("reason" => "Request form contaminated with specimen"),
          array("reason" => "Duplicate specimen received"),
          array("reason" => "Delay between specimen collection and arrival in the laboratory"),
          array("reason" => "Inappropriate specimen packing"),
          array("reason" => "Inappropriate specimen for the test"),
          array("reason" => "Inappropriate test for the clinical condition"),
          array("reason" => "No Label"),
          array("reason" => "Leaking"),
          array("reason" => "No Sample in the Container"),
          array("reason" => "No Request Form"),
          array("reason" => "Missing Information Required"),
        );
        foreach ($rejection_reasons_array as $rejection_reason)
        {
            $rejection_reasons[] = RejectionReason::create($rejection_reason);
        }
        $this->command->info('rejection_reasons seeded');

        /* Specimen table */
       
        $this->command->info('specimens seeded');
        $now = new DateTime();

        /* Test table */
        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::NOT_RECEIVED, UnhlsSpecimen::NOT_COLLECTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::NOT_RECEIVED,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
            )
        );        
        
        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeHB->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::PENDING, UnhlsSpecimen::NOT_COLLECTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
            )
        );        
        
        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeGXM->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::PENDING, UnhlsSpecimen::NOT_COLLECTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
            )
        );        
        
        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::PENDING, UnhlsSpecimen::ACCEPTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Dr. Abou Meyang",
            )
        );        
        
        $test_gxm_accepted_completed = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeGXM->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id),
                "interpretation" => "Perfect match.",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "tested_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Dr. Abou Meyang",
                "time_started" => $now->format('Y-m-d H:i:s'),
                "time_completed" => $now->add(new DateInterval('PT12M8S'))->format('Y-m-d H:i:s'),
            )
        );

        $test_hb_accepted_completed = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeHB->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id),
                "interpretation" => "Do nothing!",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "tested_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Genghiz Khan",
                "time_started" => $now->format('Y-m-d H:i:s'),
                "time_completed" => $now->add(new DateInterval('PT5M23S'))->format('Y-m-d H:i:s'),
            )
        );

        $tests_accepted_started = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeGXM->id,
                "specimen_id" => $this->createSpecimen(
                    UnhlsTest::STARTED, UnhlsSpecimen::ACCEPTED, SpecimenType::all()->last()->id, 
                    $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::STARTED,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "time_started" => $now->format('Y-m-d H:i:s'),
            )
        );

        $tests_accepted_completed = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id),
                "interpretation" => "Positive",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "tested_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Ariel Smith",
                "time_started" => $now->format('Y-m-d H:i:s'),
                "time_completed" => $now->add(new DateInterval('PT7M34S'))->format('Y-m-d H:i:s'),
            )
        );        
        
        $tests_accepted_verified = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::VERIFIED, UnhlsSpecimen::ACCEPTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id),
                "interpretation" => "Very high concentration of parasites.",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "tested_by" => $users[rand(0, count($users)-1)]->id,
                "verified_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Genghiz Khan",
                "time_started" => $now,
                "time_completed" => $now->add(new DateInterval('PT5M17S'))->format('Y-m-d H:i:s'),
                "time_verified" => $now->add(new DateInterval('PT112M33S'))->format('Y-m-d H:i:s'),
            )
        );        
        
        $tests_rejected_pending = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::PENDING, UnhlsSpecimen::REJECTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id,
                        $users[rand(0, count($users)-1)]->id,
                        $rejection_reasons[rand(0,count($rejection_reasons)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "time_started" => $now->format('Y-m-d H:i:s'),
            )
        );        

        //  WBC Started
        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeWBC->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::STARTED, UnhlsSpecimen::ACCEPTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "requested_by" => "Fred Astaire",
                "created_by" => $users[rand(0, count($users)-1)]->id,
            )
        );        
        
        $tests_rejected_started = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::STARTED, UnhlsSpecimen::REJECTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id,
                        $users[rand(0, count($users)-1)]->id,
                        $rejection_reasons[rand(0,count($rejection_reasons)-1)]->id),
                "test_status_id" => UnhlsTest::STARTED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Bony Em",
                "time_started" => $now->format('Y-m-d H:i:s'),
            )
        );
        
        $tests_rejected_completed = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeBS->id,//BS for MPS
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::COMPLETED, UnhlsSpecimen::REJECTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id,
                        $users[rand(0, count($users)-1)]->id,
                        $rejection_reasons[rand(0,count($rejection_reasons)-1)]->id),
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "tested_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Ed Buttler",
                "time_started" => $now->format('Y-m-d H:i:s'),
                "time_completed" => $now->add(new DateInterval('PT30M4S'))->format('Y-m-d H:i:s'),
            )
        );

        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeUrinalysis->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::PENDING, UnhlsSpecimen::NOT_COLLECTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
            )
        );        
        
        UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeWBC->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::PENDING, UnhlsSpecimen::NOT_COLLECTED,
                        SpecimenType::all()->last()->id,
                        $users[rand(0, count($users)-1)]->id),
                "test_status_id" => UnhlsTest::PENDING,
                "requested_by" => "Dr. Abou Meyang",
                "created_by" => $users[rand(0, count($users)-1)]->id,
            )
        );        
        
        $test_urinalysis_accepted_completed = UnhlsTest::create(
            array(
                "visit_id" => $visits[rand(0,count($visits)-1)]->id,
                "test_type_id" => $testTypeUrinalysis->id,
                "specimen_id" => $this->createSpecimen(
                        UnhlsTest::COMPLETED, UnhlsSpecimen::ACCEPTED, 
                        SpecimenType::all()->last()->id, 
                        $users[rand(0, count($users)-1)]->id),
                "interpretation" => "Whats this !!!! ###%%% ^ *() /",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => $users[rand(0, count($users)-1)]->id,
                "tested_by" => $users[rand(0, count($users)-1)]->id,
                "requested_by" => "Dr. Abou Meyang",
                "time_started" => $now->format('Y-m-d H:i:s'),
                "time_completed" => $now->add(new DateInterval('PT12M8S'))->format('Y-m-d H:i:s'),
            )
        );

        $this->command->info('tests seeded');

        /* Test Results table */
        $testResults = array(
            array(
                "test_id" => $tests_accepted_verified->id,
                "measure_id" => $measureBSforMPS->id,//BS for MPS
                "result" => "+++",
            ),
            array(
                "test_id" => $tests_accepted_completed->id,
                "measure_id" => $measureBSforMPS->id,//BS for MPS
                "result" => "++",
            ),
            array(
                "test_id" => $test_gxm_accepted_completed->id,
                "measure_id" => $measureGXM->id,
                "result" => "COMPATIBLE WITH 061832914 B/G A POS.EXPIRY19/8/14",
            ),
            array(
                "test_id" => $test_gxm_accepted_completed->id,
                "measure_id" => $measureBG->id,
                "result" => "A+",
            ),
            array(
                "test_id" => $test_hb_accepted_completed->id,
                "measure_id" => $measureHB->id,
                "result" => "13.7",
            ),
            array(
                "test_id" => $tests_rejected_completed->id,
                "measure_id" => $measureBSforMPS->id,//BS for MPS
                "result" => "No mps seen",
            ));

        foreach ($measuresUrinalysis as $key => $measure) {
            $testResults[] = array(
                "test_id" => $test_urinalysis_accepted_completed->id,
                "measure_id" => $measure->id,
                "result" => $key."50",
            );
        }

        foreach ($testResults as $testResult)
        {
            UnhlsTestResult::create($testResult);
        }
        $this->command->info('test results seeded');

        
        /* Permissions table */
        $permissions = array(
            array("name" => "view_names", "display_name" => "Can view patient names"),
            array("name" => "manage_patients", "display_name" => "Can add patients"),

            array("name" => "receive_external_test", "display_name" => "Can receive test requests"),
            array("name" => "request_test", "display_name" => "Can request new test"),
            array("name" => "accept_test_specimen", "display_name" => "Can accept test specimen"),
            array("name" => "reject_test_specimen", "display_name" => "Can reject test specimen"),
            array("name" => "change_test_specimen", "display_name" => "Can change test specimen"),
            array("name" => "start_test", "display_name" => "Can start tests"),
            array("name" => "enter_test_results", "display_name" => "Can enter tests results"),
            array("name" => "edit_test_results", "display_name" => "Can edit test results"),
            array("name" => "verify_test_results", "display_name" => "Can verify test results"),
            array("name" => "send_results_to_external_system", "display_name" => "Can send test results to external systems"),
            array("name" => "refer_specimens", "display_name" => "Can refer specimens"),

            array("name" => "manage_users", "display_name" => "Can manage users"),
            array("name" => "manage_test_catalog", "display_name" => "Can manage test catalog"),
            array("name" => "manage_lab_configurations", "display_name" => "Can manage lab configurations"),
            array("name" => "view_reports", "display_name" => "Can view reports"),
            array("name" => "manage_inventory", "display_name" => "Can manage inventory"),
            array("name" => "request_topup", "display_name" => "Can request top-up"),
            array("name" => "manage_qc", "display_name" => "Can manage Quality Control")
        );

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
        $this->command->info('Permissions table seeded');

        /* Roles table */
        $roles = array(
            array("name" => "Superadmin"),
            array("name" => "Technologist"),
            array("name" => "Receptionist")
        );
        foreach ($roles as $role) {
            Role::create($role);
        }
        $this->command->info('Roles table seeded');

        $user1 = User::find(1);
        $role1 = Role::find(1);
        $permissions = Permission::all();

        //Assign all permissions to role administrator
        foreach ($permissions as $permission) {
            $role1->attachPermission($permission);
        }
        //Assign role Administrator to user 1 administrator
        $user1->attachRole($role1);

        /* Instruments table */
        $instrumentsData = array(
            "name" => "Celltac F Mek 8222",
            "description" => "Automatic analyzer with 22 parameters and WBC 5 part diff Hematology Analyzer",
            "driver_name" => "KBLIS\\Plugins\\CelltacFMachine",
            "ip" => "192.168.1.12",
            "hostname" => "HEMASERVER"
        );
        
        $instrument = Instrument::create($instrumentsData);
        $instrument->testTypes()->attach(array($testTypeWBC->id));

        $this->command->info('Instruments table seeded');

        //  Begin seed for prevalence rates report
        /* Test Categories table - These map on to the lab sections */
        $lab_section_hematology = TestCategory::create(array("name" => "HEMATOLOGY","description" => ""));
        $lab_section_serology = TestCategory::create(array("name" => "SEROLOGY","description" => ""));
        $lab_section_trans = TestCategory::create(array("name" => "BLOOD TRANSFUSION","description" => ""));
        $this->command->info('Lab Sections seeded');

        /* Test Types for prevalence */
        $test_types_salmonella = TestType::create(array("name" => "Salmonella Antigen Test", "test_category_id" => $test_categories->id));
        $test_types_direct = TestType::create(array("name" => "Direct COOMBS Test", "test_category_id" => $lab_section_trans->id));
        $test_types_du = TestType::create(array("name" => "DU Test", "test_category_id" => $lab_section_trans->id));
        $test_types_sickling = TestType::create(array("name" => "Sickling Test", "test_category_id" => $lab_section_hematology->id));
        $test_types_borrelia = TestType::create(array("name" => "Borrelia", "test_category_id" => $test_categories->id));
        $test_types_vdrl = TestType::create(array("name" => "VDRL", "test_category_id" => $lab_section_serology->id));
        $test_types_pregnancy = TestType::create(array("name" => "Pregnancy Test", "test_category_id" => $lab_section_serology->id));
        $test_types_brucella = TestType::create(array("name" => "Brucella", "test_category_id" => $lab_section_serology->id));
        $test_types_pylori = TestType::create(array("name" => "H. Pylori", "test_category_id" => $lab_section_serology->id));

        $this->command->info('Test Types seeded');

        /* Test Types and specimen types relationship for prevalence */
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_salmonella->id, "13"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_direct->id, "23"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_du->id, "23"));
         DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_sickling->id, "23"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_borrelia->id, "23"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_vdrl->id, "13"));
         DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_pregnancy->id, "20"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_brucella->id, "13"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($test_types_pylori->id, "13"));
        DB::insert('INSERT INTO testtype_specimentypes (test_type_id, specimen_type_id) VALUES (?, ?)', 
            array($testTypeStoolCS->id, "16"));
        $this->command->info('TestTypes/SpecimenTypes seeded');
        
        /*New measures for prevalence*/
        $measure_salmonella = Measure::create(array("measure_type_id" => "2", "name" => "Salmonella Antigen Test", "unit" => ""));
        $measure_direct = Measure::create(array("measure_type_id" => "2", "name" => "Direct COOMBS Test", "unit" => ""));
        $measure_du = Measure::create(array("measure_type_id" => "2", "name" => "Du Test", "unit" => ""));
        $measure_sickling = Measure::create(array("measure_type_id" => "2", "name" => "Sickling Test", "unit" => ""));
        $measure_borrelia = Measure::create(array("measure_type_id" => "2", "name" => "Borrelia", "unit" => ""));
        $measure_vdrl = Measure::create(array("measure_type_id" => "2", "name" => "VDRL", "unit" => ""));
        $measure_pregnancy = Measure::create(array("measure_type_id" => "2", "name" => "Pregnancy Test", "unit" => ""));
        $measure_brucella = Measure::create(array("measure_type_id" => "2", "name" => "Brucella", "unit" => ""));
        $measure_pylori = Measure::create(array("measure_type_id" => "2", "name" => "H. Pylori", "unit" => ""));
        MeasureRange::create(array("measure_id" => $measure_salmonella->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_salmonella->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_direct->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_direct->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_du->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_du->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_sickling->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_sickling->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_borrelia->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_borrelia->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_vdrl->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_vdrl->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_pregnancy->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_pregnancy->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_brucella->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_brucella->id, "alphanumeric" => "Negative"));
        MeasureRange::create(array("measure_id" => $measure_pylori->id, "alphanumeric" => "Positive"));
        MeasureRange::create(array("measure_id" => $measure_pylori->id, "alphanumeric" => "Negative"));
        $this->command->info('Measures seeded again');

        /* TestType Measure for prevalence */
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_salmonella->id, "measure_id" => $measure_salmonella->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_direct->id, "measure_id" => $measure_direct->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_du->id, "measure_id" => $measure_du->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_sickling->id, "measure_id" => $measure_sickling->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_borrelia->id, "measure_id" => $measure_borrelia->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_vdrl->id, "measure_id" => $measure_vdrl->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_pregnancy->id, "measure_id" => $measure_pregnancy->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_brucella->id, "measure_id" => $measure_brucella->id));
        $testtype_measure = TestTypeMeasure::create(array("test_type_id" => $test_types_pylori->id, "measure_id" => $measure_pylori->id));
        $this->command->info('Test Type Measures seeded again');

        /*  Tests for prevalence rates  */
        $tests_completed_one = UnhlsTest::create(array(
                "visit_id" => "1",
                "test_type_id" => $test_types_salmonella->id,
                "specimen_id" => "4",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-07-23 15:16:15",
                "time_started" => "2014-07-23 16:07:15",
                "time_completed" => "2014-07-23 16:17:19",
            )
        );
        $tests_completed_two = UnhlsTest::create(array(
                "visit_id" => "2",
                "test_type_id" => $test_types_direct->id,
                "specimen_id" => "3",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-07-26 10:16:15",
                "time_started" => "2014-07-26 13:27:15",
                "time_completed" => "2014-07-26 13:57:01",
            )
        );
        $tests_completed_three = UnhlsTest::create(array(
                "visit_id" => "3",
                "test_type_id" => $test_types_du->id,
                "specimen_id" => "2",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-08-13 09:16:15",
                "time_started" => "2014-08-13 10:07:15",
                "time_completed" => "2014-08-13 10:18:11",
            )
        );
        $tests_completed_four = UnhlsTest::create(array(
                "visit_id" => "4",
                "test_type_id" => $test_types_sickling->id,
                "specimen_id" => "1",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-08-16 09:06:53",
                "time_started" => "2014-08-16 09:09:15",
                "time_completed" => "2014-08-16 09:23:37",
            )
        );
        $tests_completed_five = UnhlsTest::create(array(
                "visit_id" => "5",
                "test_type_id" => $test_types_borrelia->id,
                "specimen_id" => "1",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-08-23 10:16:15",
                "time_started" => "2014-08-23 11:54:39",
                "time_completed" => "2014-08-23 12:07:18",
            )
        );
        $tests_completed_six = UnhlsTest::create(array(
                "visit_id" => "6",
                "test_type_id" => $test_types_vdrl->id,
                "specimen_id" => "2",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-09-07 07:23:15",
                "time_started" => "2014-09-07 08:07:20",
                "time_completed" => "2014-09-07 08:41:13",
            )
        );
        $tests_completed_seven = UnhlsTest::create(array(
                "visit_id" => "7",
                "test_type_id" => $test_types_pregnancy->id,
                "specimen_id" => "3",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-10-03 11:52:15",
                "time_started" => "2014-10-03 12:31:04",
                "time_completed" => "2014-10-03 12:45:18",
            )
        );
        $tests_completed_eight = UnhlsTest::create(array(
                "visit_id" => "1",
                "test_type_id" => $test_types_brucella->id,
                "specimen_id" => "4",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-10-15 17:01:15",
                "time_started" => "2014-10-15 17:05:24",
                "time_completed" => "2014-10-15 18:07:15",
            )
        );
        $tests_completed_nine = UnhlsTest::create(array(
                "visit_id" => "2",
                "test_type_id" => $test_types_pylori->id,
                "specimen_id" => "4",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-10-23 16:06:15",
                "time_started" => "2014-10-23 16:07:15",
                "time_completed" => "2014-10-23 16:39:02",
            )
        );
        $tests_completed_ten = UnhlsTest::create(array(
                "visit_id" => "4",
                "test_type_id" => $test_types_salmonella->id,
                "specimen_id" => "3",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::COMPLETED,
                "created_by" => "2",
                "tested_by" => "3",
                "requested_by" => "Ariel Smith",
                "time_created" => "2014-10-21 19:16:15",
                "time_started" => "2014-10-21 19:17:15",
                "time_completed" => "2014-10-21 19:52:40",
            )
        );     
        
        $tests_verified_one = UnhlsTest::create(
            array(
                "visit_id" => "3",
                "test_type_id" => $test_types_direct->id,
                "specimen_id" => "2",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-07-21 19:16:15",
                "time_started" => "2014-07-21 19:17:15",
                "time_completed" => "2014-07-21 19:52:40",
                "time_verified" => "2014-07-21 19:53:48",
            )
        );
        $tests_verified_two = UnhlsTest::create(
            array(
                "visit_id" => "2",
                "test_type_id" => $test_types_du->id,
                "specimen_id" => "1",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-08-21 19:16:15",
                "time_started" => "2014-08-21 19:17:15",
                "time_completed" => "2014-08-21 19:52:40",
                "time_verified" => "2014-08-21 19:53:48",
            )
        );
        $tests_verified_three = UnhlsTest::create(
            array(
                "visit_id" => "3",
                "test_type_id" => $test_types_sickling->id,
                "specimen_id" => "4",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-08-26 19:16:15",
                "time_started" => "2014-08-26 19:17:15",
                "time_completed" => "2014-08-26 19:52:40",
                "time_verified" => "2014-08-26 19:53:48",
            )
        );
        $tests_verified_four = UnhlsTest::create(
            array(
                "visit_id" => "4",
                "test_type_id" => $test_types_borrelia->id,
                "specimen_id" => "2",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-09-21 19:16:15",
                "time_started" => "2014-09-21 19:17:15",
                "time_completed" => "2014-09-21 19:52:40",
                "time_verified" => "2014-09-21 19:53:48",
            )
        );
        $tests_verified_five = UnhlsTest::create(
            array(
                "visit_id" => "1",
                "test_type_id" => $test_types_vdrl->id,
                "specimen_id" => "3",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-09-22 19:16:15",
                "time_started" => "2014-09-22 19:17:15",
                "time_completed" => "2014-09-22 19:52:40",
                "time_verified" => "2014-09-22 19:53:48",
            )
        );
        $tests_verified_six = UnhlsTest::create(
            array(
                "visit_id" => "1",
                "test_type_id" => $test_types_pregnancy->id,
                "specimen_id" => "4",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-09-23 19:16:15",
                "time_started" => "2014-09-23 19:17:15",
                "time_completed" => "2014-09-23 19:52:40",
                "time_verified" => "2014-09-23 19:53:48",
            )
        );
        $tests_verified_seven = UnhlsTest::create(
            array(
                "visit_id" => "1",
                "test_type_id" => $test_types_brucella->id,
                "specimen_id" => "2",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-09-27 19:16:15",
                "time_started" => "2014-09-27 19:17:15",
                "time_completed" => "2014-09-27 19:52:40",
                "time_verified" => "2014-09-27 19:53:48",
            )
        );
        $tests_verified_eight = UnhlsTest::create(
            array(
                "visit_id" => "3",
                "test_type_id" => $test_types_pylori->id,
                "specimen_id" => "4",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-10-22 19:16:15",
                "time_started" => "2014-10-22 19:17:15",
                "time_completed" => "2014-10-22 19:52:40",
                "time_verified" => "2014-10-22 19:53:48",
            )
        );
        $tests_verified_nine = UnhlsTest::create(
            array(
                "visit_id" => "4",
                "test_type_id" => $test_types_pregnancy->id,
                "specimen_id" => "3",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-10-17 19:16:15",
                "time_started" => "2014-10-17 19:17:15",
                "time_completed" => "2014-10-17 19:52:40",
                "time_verified" => "2014-10-17 19:53:48",
            )
        );
        $tests_verified_ten = UnhlsTest::create(
            array(
                "visit_id" => "2",
                "test_type_id" => $test_types_pregnancy->id,
                "specimen_id" => "1",
                "interpretation" => "Budda Boss",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-10-02 19:16:15",
                "time_started" => "2014-10-02 19:17:15",
                "time_completed" => "2014-10-02 19:52:40",
                "time_verified" => "2014-10-02 19:53:48",
            )
        );
        $this->command->info('Tests seeded again');
        //  Test results for prevalence
        $results = array(
            array(
                "test_id" => $tests_completed_one->id,
                "measure_id" => $measure_salmonella->id,//BS for MPS
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_two->id,
                "measure_id" => $measure_direct->id,
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_three->id,
                "measure_id" => $measure_du->id,
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_four->id,
                "measure_id" => $measure_sickling->id,
                "result" => "Positive",
            ),
             array(
                "test_id" => $tests_completed_five->id,
                "measure_id" => $measure_borrelia->id,//BS for MPS
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_six->id,
                "measure_id" => $measure_vdrl->id,
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_seven->id,
                "measure_id" => $measure_pregnancy->id,
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_eight->id,
                "measure_id" => $measure_brucella->id,
                "result" => "Positive",
            ),
             array(
                "test_id" => $tests_completed_nine->id,
                "measure_id" => $measure_pylori->id,//BS for MPS
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_completed_ten->id,
                "measure_id" => $measure_salmonella->id,
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_verified_one->id,
                "measure_id" => $measure_direct->id,
                "result" => "Negative",
            ),
            array(
                "test_id" => $tests_verified_two->id,
                "measure_id" => $measure_du->id,
                "result" => "Positive",
            ),
             array(
                "test_id" => $tests_verified_three->id,
                "measure_id" => $measure_sickling->id,//BS for MPS
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_verified_four->id,
                "measure_id" => $measure_borrelia->id,
                "result" => "Negative",
            ),
            array(
                "test_id" => $tests_verified_five->id,
                "measure_id" => $measure_vdrl->id,
                "result" => "Negative",
            ),
            array(
                "test_id" => $tests_verified_six->id,
                "measure_id" => $measure_pregnancy->id,
                "result" => "Negative",
            ),
             array(
                "test_id" => $tests_verified_seven->id,
                "measure_id" => $measure_brucella->id,//BS for MPS
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_verified_eight->id,
                "measure_id" => $measure_pylori->id,
                "result" => "Positive",
            ),
            array(
                "test_id" => $tests_verified_nine->id,
                "measure_id" => $measure_pregnancy->id,
                "result" => "Negative",
            ),
            array(
                "test_id" => $tests_verified_ten->id,
                "measure_id" => $measure_pregnancy->id,
                "result" => "Positive",
            ),
        );        
        foreach ($results as $result)
        {
            UnhlsTestResult::create($result);
        }
        $this->command->info('Test results seeded again');
        //  End prevalence rates seed

        //Seed for suppliers
        $supplier = Supplier::create(
            array(
                "name" => "UNICEF",
                "phone_no" => "0775112233",
                "email" => "uni@unice.org",
                "physical_address" => "un-hqtr"

            )
        );
        $this->command->info('Suppliers table seeded');

        //Seed for metrics
        $metric = Metric::create(
            array(
                "name" => "mg",
                "description" => "milligram"
            )
        );
        $this->command->info('Metrics table seeded');

        //Seed for commodities
        $commodity = Commodity::create(
            array(
                "name" => "Ampicillin",
                "description" => "Capsule 250mg",
                "metric_id" => $metric->id,
                "unit_price" => "500",
                "item_code" => "no clue",
                "storage_req" => "no clue",
                "min_level" => "100000",
                "max_level" => "400000")
        );
        $this->command->info('Commodities table seeded');
        
        //Seed for receipts
        $receipt = Receipt::create(
            array(
                "commodity_id" => $commodity->id,
                "supplier_id" => $supplier->id, 
                "quantity" => "130000",
                "batch_no" => "002720",
                "expiry_date" => "2018-10-14", 
                "user_id" => "1")
        );
        $this->command->info('Receipts table seeded');
        
        //Seed for Top Up Request
        $topUpRequest = TopupRequest::create(
            array(
                "commodity_id" => $commodity->id,
                "test_category_id" => 1,
                "order_quantity" => "1500",
                "user_id" => 1,
                "remarks" => "-")
        );
        $this->command->info('Top Up Requests table seeded');

        //Seed for Issues
        Issue::create(
            array(
                "receipt_id" => $receipt->id,
                "topup_request_id" => $topUpRequest->id,
                "quantity_issued" => "1700",
                "issued_to" => 1,
                "user_id" => 1,
                "remarks" => "-")
        );
        $this->command->info('Issues table seeded');

        //Seed for diseases
        $malaria = Disease::create(array('name' => "Malaria"));
        $typhoid = Disease::create(array('name' => "Typhoid"));
        $dysentry = Disease::create(array('name' => "Shigella Dysentry"));

        $this->command->info("Dieases table seeded");

        $reportDiseases = array(
            array(
                "test_type_id" => $testTypeBS->id,
                "disease_id" => $malaria->id,
                ),
             array(
                "test_type_id" => $test_types_salmonella->id,
                "disease_id" => $typhoid->id,
                ),
             array(
                "test_type_id" => $testTypeStoolCS->id,
                "disease_id" => $dysentry->id,
                ),
        );

        foreach ($reportDiseases as $reportDisease) {
            ReportDisease::create($reportDisease);
        }
        $this->command->info("Report Disease table seeded");

        //Seeding for QC
        $lots = array(
            array('number'=> '0001',
                'description' => 'First lot',
                'expiry' => date('Y-m-d H:i:s', strtotime("+6 months")),
                'instrument_id' => 1),
            array('number'=> '0002',
                'description' => 'Second lot',
                'expiry' => date('Y-m-d H:i:s', strtotime("+7 months")),
                'instrument_id' => 1));
        foreach ($lots as $lot) {
            $lot = Lot::create($lot);
        }
        $this->command->info("Lot table seeded");

        //Control seeding
        $controls = array(
            array('name'=>'Humatrol P', 
                    'description' =>'HUMATROL P control serum has been designed to provide a suitable basis for the quality control (imprecision, inracy) in the clinical chemical laboratory.', 
                    'lot_id' => 1),
            array('name'=>'Full Blood Count', 'description' => 'Né pas touchér', 'lot_id' => 1,)
            );
        foreach ($controls as $control) {
            Control::create($control);
        }
        $this->command->info("Control table seeded");

        //Control measures
        $controlMeasures = array(
                    //Humatrol P
                    array('name' => 'ca', 'unit' => 'mmol', 'control_id' => 1, 'control_measure_type_id' => 1),
                    array('name' => 'pi', 'unit' => 'mmol', 'control_id' => 1, 'control_measure_type_id' => 1),
                    array('name' => 'mg', 'unit' => 'mmol', 'control_id' => 1, 'control_measure_type_id' => 1),
                    array('name' => 'na', 'unit' => 'mmol', 'control_id' => 1, 'control_measure_type_id' => 1),
                    array('name' => 'K', 'unit' => 'mmol', 'control_id' => 1, 'control_measure_type_id' => 1),

                    //Full Blood Count
                    array('name' => 'WBC', 'unit' => 'x 103/uL', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'RBC', 'unit' => 'x 106/uL', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'HGB', 'unit' => 'g/dl', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'HCT', 'unit' => '%', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'MCV', 'unit' => 'fl', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'MCH', 'unit' => 'pg', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'MCHC', 'unit' => 'g/dl', 'control_id' => 2, 'control_measure_type_id' => 1),
                    array('name' => 'PLT', 'unit' => 'x 103/uL', 'control_id' => 2, 'control_measure_type_id' => 1),
            );
        foreach ($controlMeasures as $controlMeasure) {
            ControlMeasure::create($controlMeasure);
        }
        $this->command->info("Control Measure table seeded");

        //Control measure ranges
        $controlMeasureRanges = array(
                //Humatrol P
                array('upper_range' => '2.63', 'lower_range' => '7.19', 'control_measure_id' => 1),
                array('upper_range' => '11.65', 'lower_range' => '15.43', 'control_measure_id' => 2),
                array('upper_range' => '12.13', 'lower_range' => '19.11', 'control_measure_id' => 3),
                array('upper_range' => '15.73', 'lower_range' => '25.01', 'control_measure_id' => 4),
                array('upper_range' => '17.63', 'lower_range' => '20.12', 'control_measure_id' => 5),

                //Full blood count
                array('upper_range' => '6.5', 'lower_range' => '7.5', 'control_measure_id' => 6),
                array('upper_range' => '4.36', 'lower_range' => '5.78', 'control_measure_id' => 7),
                array('upper_range' => '13.8', 'lower_range' => '17.3', 'control_measure_id' => 8),
                array('upper_range' => '81.0', 'lower_range' => '95.0', 'control_measure_id' => 9),
                array('upper_range' => '1.99', 'lower_range' => '2.63', 'control_measure_id' => 10),
                array('upper_range' => '27.6', 'lower_range' => '33.0', 'control_measure_id' => 11),
                array('upper_range' => '32.8', 'lower_range' => '36.4', 'control_measure_id' => 12),
                array('upper_range' => '141', 'lower_range' => ' 320.0', 'control_measure_id' => 13)
            );
        foreach ($controlMeasureRanges as $controlMeasureRange) {
            ControlMeasureRange::create($controlMeasureRange);
        }
        $this->command->info("Control Measure ranges table seeded");

        //Control Tests
        $controlTests = array(
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-10 days'))),
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-9 days'))),
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-8 days'))),
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-7 days'))),
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-6 days'))),
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-5 days'))),
                array('entered_by'=> 1, 'control_id'=> 1, 'created_at'=>date('Y-m-d', strtotime('-4 days'))),
                array('entered_by'=> 1, 'control_id'=> 2, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('entered_by'=> 1, 'control_id'=> 2, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
            );
        foreach ($controlTests as $controltest) {
            ControlTest::create($controltest);
        }
        $this->command->info("Control test table seeded");

        //Control results
        $controlResults = array(
                //Results fro Humatrol P
                array('results' => '2.78', 'control_measure_id' => 1, 'control_test_id' => 1, 'created_at'=>date('Y-m-d', strtotime('-10 days'))),
                array('results' => '13.56', 'control_measure_id' => 2, 'control_test_id' => 1, 'created_at'=>date('Y-m-d', strtotime('-10 days'))),
                array('results' => '14.77', 'control_measure_id' => 3, 'control_test_id' => 1, 'created_at'=>date('Y-m-d', strtotime('-10 days'))),
                array('results' => '25.92', 'control_measure_id' => 4, 'control_test_id' => 1, 'created_at'=>date('Y-m-d', strtotime('-10 days'))),
                array('results' => '18.87', 'control_measure_id' => 5, 'control_test_id' => 1, 'created_at'=>date('Y-m-d', strtotime('-10 days'))),

                 //Results fro Humatrol P
                array('results' => '6.78', 'control_measure_id' => 1, 'control_test_id' => 2, 'created_at'=>date('Y-m-d', strtotime('-9 days'))),
                array('results' => '15.56', 'control_measure_id' => 2, 'control_test_id' => 2, 'created_at'=>date('Y-m-d', strtotime('-9 days'))),
                array('results' => '18.77', 'control_measure_id' => 3, 'control_test_id' => 2, 'created_at'=>date('Y-m-d', strtotime('-9 days'))),
                array('results' => '30.92', 'control_measure_id' => 4, 'control_test_id' => 2, 'created_at'=>date('Y-m-d', strtotime('-9 days'))),
                array('results' => '17.87', 'control_measure_id' => 5, 'control_test_id' => 2, 'created_at'=>date('Y-m-d', strtotime('-9 days'))),

                 //Results fro Humatrol P
                array('results' => '8.78', 'control_measure_id' => 1, 'control_test_id' => 3, 'created_at'=>date('Y-m-d', strtotime('-8 days'))),
                array('results' => '17.56', 'control_measure_id' => 2, 'control_test_id' => 3, 'created_at'=>date('Y-m-d', strtotime('-8 days'))),
                array('results' => '21.77', 'control_measure_id' => 3, 'control_test_id' => 3, 'created_at'=>date('Y-m-d', strtotime('-8 days'))),
                array('results' => '27.92', 'control_measure_id' => 4, 'control_test_id' => 3, 'created_at'=>date('Y-m-d', strtotime('-8 days'))),
                array('results' => '22.87', 'control_measure_id' => 5, 'control_test_id' => 3, 'created_at'=>date('Y-m-d', strtotime('-8 days'))),

                 //Results fro Humatrol P
                array('results' => '6.78', 'control_measure_id' => 1, 'control_test_id' => 4, 'created_at'=>date('Y-m-d', strtotime('-7 days'))),
                array('results' => '18.56', 'control_measure_id' => 2, 'control_test_id' => 4, 'created_at'=>date('Y-m-d', strtotime('-7 days'))),
                array('results' => '19.77', 'control_measure_id' => 3, 'control_test_id' => 4, 'created_at'=>date('Y-m-d', strtotime('-7 days'))),
                array('results' => '12.92', 'control_measure_id' => 4, 'control_test_id' => 4, 'created_at'=>date('Y-m-d', strtotime('-7 days'))),
                array('results' => '22.87', 'control_measure_id' => 5, 'control_test_id' => 4, 'created_at'=>date('Y-m-d', strtotime('-7 days'))),

                 //Results fro Humatrol P
                array('results' => '3.78', 'control_measure_id' => 1, 'control_test_id' => 5, 'created_at'=>date('Y-m-d', strtotime('-6 days'))),
                array('results' => '16.56', 'control_measure_id' => 2, 'control_test_id' => 5, 'created_at'=>date('Y-m-d', strtotime('-6 days'))),
                array('results' => '17.77', 'control_measure_id' => 3, 'control_test_id' => 5, 'created_at'=>date('Y-m-d', strtotime('-6 days'))),
                array('results' => '28.92', 'control_measure_id' => 4, 'control_test_id' => 5, 'created_at'=>date('Y-m-d', strtotime('-6 days'))),
                array('results' => '19.87', 'control_measure_id' => 5, 'control_test_id' => 5, 'created_at'=>date('Y-m-d', strtotime('-6 days'))),

                 //Results fro Humatrol P
                array('results' => '5.78', 'control_measure_id' => 1, 'control_test_id' => 6, 'created_at'=>date('Y-m-d', strtotime('-5 days'))),
                array('results' => '15.56', 'control_measure_id' => 2, 'control_test_id' => 6, 'created_at'=>date('Y-m-d', strtotime('-5 days'))),
                array('results' => '11.77', 'control_measure_id' => 3, 'control_test_id' => 6, 'created_at'=>date('Y-m-d', strtotime('-5 days'))),
                array('results' => '29.92', 'control_measure_id' => 4, 'control_test_id' => 6, 'created_at'=>date('Y-m-d', strtotime('-5 days'))),
                array('results' => '14.87', 'control_measure_id' => 5, 'control_test_id' => 6, 'created_at'=>date('Y-m-d', strtotime('-5 days'))),

                 //Results fro Humatrol P
                array('results' => '9.78', 'control_measure_id' => 1, 'control_test_id' => 7, 'created_at'=>date('Y-m-d', strtotime('-4 days'))),
                array('results' => '11.56', 'control_measure_id' => 2, 'control_test_id' => 7, 'created_at'=>date('Y-m-d', strtotime('-4 days'))),
                array('results' => '19.77', 'control_measure_id' => 3, 'control_test_id' => 7, 'created_at'=>date('Y-m-d', strtotime('-4 days'))),
                array('results' => '32.92', 'control_measure_id' => 4, 'control_test_id' => 7, 'created_at'=>date('Y-m-d', strtotime('-4 days'))),
                array('results' => '29.87', 'control_measure_id' => 5, 'control_test_id' => 7, 'created_at'=>date('Y-m-d', strtotime('-4 days'))),

                //Results for Full blood count
                array('results' => '5.45', 'control_measure_id' => 6, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '5.01', 'control_measure_id' => 7, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '12.3', 'control_measure_id' => 8, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '89.7', 'control_measure_id' => 9, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '2.15', 'control_measure_id' => 10, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '34.0', 'control_measure_id' => 11, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '37.2', 'control_measure_id' => 12, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),
                array('results' => '141.5', 'control_measure_id' => 13, 'control_test_id' => 8, 'created_at'=>date('Y-m-d', strtotime('-3 days'))),

                //Results for Full blood count
                array('results' => '7.45', 'control_measure_id' => 6, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '9.01', 'control_measure_id' => 7, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '9.3',  'control_measure_id' => 8, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '94.7', 'control_measure_id' => 9, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '12.15','control_measure_id' => 10, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '37.0', 'control_measure_id' => 11, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '30.2', 'control_measure_id' => 12, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
                array('results' => '121.5','control_measure_id' =>  13, 'control_test_id' => 9, 'created_at'=>date('Y-m-d', strtotime('-2 days'))),
            );
        
        foreach ($controlResults as $controlResult) {
            ControlMeasureResult::create($controlResult);
        }
        $this->command->info("Control results table seeded");

        //Seed for drugs
        $penicillin = Drug::create(array('name' => "PENICILLIN"));
        $ampicillin = Drug::create(array('name' => "AMPICILLIN"));
        $clindamycin = Drug::create(array('name' => "CLINDAMYCIN"));
        $tetracycline = Drug::create(array('name' => "TETRACYCLINE"));
        $ciprofloxacin = Drug::create(array('name' => "CIPROFLOXACIN"));
        $trimeth = Drug::create(array('name' => "TRIMETHOPRIM/SULFA"));
        $nitrofurantoin = Drug::create(array('name' => "NITROFURANTOIN"));
        $chloramphenicol = Drug::create(array('name' => "CHLORAMPHENICOL"));
        $cefazolin = Drug::create(array('name' => "CEFAZOLIN"));
        $gentamicin = Drug::create(array('name' => "GENTAMICIN"));
        $amoxicillin = Drug::create(array('name' => "AMOXICILLIN-CLAV"));
        $cephalothin = Drug::create(array('name' => "CEPHALOTHIN"));
        $cefuroxime = Drug::create(array('name' => "CEFUROXIME"));
        $cefotaxime = Drug::create(array('name' => "CEFOTAXIME"));
        $piperacillin = Drug::create(array('name' => "PIPERACILLIN"));
        $cefixime = Drug::create(array('name' => "CEFIXIME"));
        $ceftazidime = Drug::create(array('name' => "CEFTAZIDIME"));
        $cefriaxone = Drug::create(array('name' => "CEFRIAXONE"));
        $levofloxacin = Drug::create(array('name' => "LEVOFLOXACIN"));
        $merodenem = Drug::create(array('name' => "MERODENEM"));
        $imedenem = Drug::create(array('name' => "IMEDENEM"));
        $oxacillin = Drug::create(array('name' => "OXACILLIN (CEFOXITIN)"));
        $erythromycin = Drug::create(array('name' => "ERYTHROMYCIN"));
        $vancomycin = Drug::create(array('name' => "VANCOMYCIN"));
        $cefoxitin = Drug::create(array('name' => "CEFOXITIN"));
        $tobramycin = Drug::create(array('name' => "TOBRAMYCIN"));
        $sulbactam = Drug::create(array('name' => "AMPICILLIN-SULBACTAM"));
        $trimethoprim = Drug::create(array('name' => "TRIMETHOPRIM"));
        $amikacin = Drug::create(['name' => 'AMIKACIN']);
        $augmentin = Drug::create(['name' => 'AUGMENTIN']);
        $ceftriaxione = Drug::create(['name' => 'CEFTRIAXIONE']);
        $cotrimoxazole = Drug::create(['name' => 'CO-TRIMOXAZOLE']);
        $imipenem = Drug::create(['name' => 'IMIPENEM']);
        $meropenem = Drug::create(['name' => 'MEROPENEM']);
        $peperacillintazobactam = Drug::create(['name' => 'PIPERACILLIN/TAZO']);

        $this->command->info('Drugs table seeded');
        //Seed for organisims
        $staphylococci = Organism::create(array('name' => "Staphylococci species"));
        $gramnegative = Organism::create(array('name' => "Gram negative cocci"));
        $pseudomonas = Organism::create(array('name' => "Pseudomonas aeruginosa"));
        $enterococcus = Organism::create(array('name' => "Enterococcus species"));
        $pneumoniae = Organism::create(array('name' => "Streptococcus pneumoniae"));
        $streptococcus = Organism::create(array('name' => "Streptococcus species viridans group"));
        $beta = Organism::create(array('name' => "Beta-haemolytic streptococci"));
        $haemophilus = Organism::create(array('name' => "Haemophilus influenzae"));
        $naisseria = Organism::create(array('name' => "Naisseria menengitidis"));
        $salmonella = Organism::create(array('name' => "Salmonella species"));
        $shigella = Organism::create(array('name' => "Shigella"));
        $vibrio = Organism::create(array('name' => "Vibrio cholerae"));
        $grampositive = Organism::create(array('name' => "Gram positive cocci"));
        $ecoli = Organism::create(['name' => 'E.coli']);
        $oralPharyngealFlora = Organism::create(['name' => 'Oral-pharyngeal flora']);

        $this->command->info('Organisms table seeded');
        $microbiologyVisit = UnhlsVisit::create(["patient_id" => 1]);

        $specimenTypeSputum = SpecimenType::create(["name" => "Sputum"]);

        $specimenSputum = UnhlsSpecimen::create([
            "specimen_type_id" => $specimenTypeSputum->id,
            "specimen_status_id" => UnhlsSpecimen::ACCEPTED,
            "accepted_by" => 1,
            "time_accepted" => date('Y-m-d H:i:s')]);

        $testTypeAST = TestType::create([
                "name" => "AST",
                "test_category_id" => $lab_section_microbiology->id,
                "orderable_test" => 1
        ]);
        $testTypeAppearance = TestType::create([
            'name' => 'Appearance',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeGramStain = TestType::create([
            'name' => 'Gram stain',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeZnStain = TestType::create([
            'name' => 'ZN stain',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeModifiedZn = TestType::create([
            'name' => 'Modified ZN',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);
        $testTypeWetSalineIodinePrep = TestType::create([
            'name' => 'Wet Saline Iodine Prep',
            'test_category_id' => $lab_section_microbiology->id,
            'orderable_test' => 1
        ]);

        $measureAppearance = Measure::create(['measure_type_id' => '4', 'name' => 'Appearance', 'unit' => '']);
        $measureGramStain = Measure::create(['measure_type_id' => '4', 'name' => 'Gram stain', 'unit' => '']);
        $measureZnStain = Measure::create(['measure_type_id' => '4', 'name' => 'ZN stain', 'unit' => '']);
        $measureModifiedZn = Measure::create(['measure_type_id' => '4', 'name' => 'Modified ZN', 'unit' => '']);
        $measureWetSalineIodinePrep = Measure::create(['measure_type_id' => '4', 'name' => 'Wet Saline Iodine Prep', 'unit' => '']);
        $measureAST = Measure::create(['measure_type_id' => '4', 'name' => 'AST', 'unit' => '']);

        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAST->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeAppearance->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeGramStain->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeZnStain->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeModifiedZn->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood


        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[0]->id]);// Ascitic Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[1]->id]);// Aspirate
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[2]->id]);// CSF
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[3]->id]);// Dried Blood Spot
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[4]->id]);// High Vaginal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[5]->id]);// Nasal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[6]->id]);// Plasma
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[7]->id]);// Plasma EDTA
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[8]->id]);// Pleural Tap
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[9]->id]);// Pus Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[10]->id]);// Rectal Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[11]->id]);// Semen
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[12]->id]);// Serum
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[13]->id]);// Skin
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[14]->id]);// Vomitus
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[15]->id]);// Stool
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[16]->id]);// Synovial Fluid
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[17]->id]);// Throat Swab
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[18]->id]);// Urethral Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[19]->id]);// Urine
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[20]->id]);// Vaginal Smear
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[21]->id]);// Water
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeWetSalineIodinePrep->id, "specimen_type_id" => $specTypes[22]->id]);// Whole Blood

        $testAST = UnhlsTest::create([
                "visit_id" => $microbiologyVisit->id,
                "test_type_id" => $testTypeAST->id,
                'specimen_id' => $specimenSputum->id,
                "interpretation" => "Format being deliberated",
                "test_status_id" => UnhlsTest::VERIFIED,
                "created_by" => "3",
                "tested_by" => "2",
                "verified_by" => "3",
                "requested_by" => "Genghiz Khan",
                "time_created" => "2014-10-17 19:16:15",
                "time_started" => "2014-10-17 19:17:15",
                "time_completed" => "2014-10-17 19:52:40",
                "time_verified" => "2014-10-17 19:53:48",
        ]);
        $testAppearanceMucoSalivary = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeAppearance->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testGramStain = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeGramStain->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testZnStain = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeZnStain->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testASToralPharyngealFlora = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeAST->id,
            'specimen_id' => '1',
            'interpretation' => '',
            'test_status_id' => UnhlsTest::PENDING,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testAppearanceFormed = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeAppearance->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testModifiedZn = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeModifiedZn->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testWetSalineIodinePrep = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeWetSalineIodinePrep->id,
            'specimen_id' => $specimenSputum->id,
            'interpretation' => '',
            'test_status_id' => UnhlsTest::VERIFIED,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);
        $testASTecoli = UnhlsTest::create([
            'visit_id' => $microbiologyVisit->id,
            'test_type_id' => $testTypeAST->id,
            'specimen_id' => '2',
            'interpretation' => '',
            'test_status_id' => UnhlsTest::PENDING,
            'created_by' => '3',
            'tested_by' => '2',
            'verified_by' => '3',
            'requested_by' => 'Genghiz Khan',
            'time_created' => '2014-10-17 19:16:15',
            'time_started' => '2014-10-17 19:17:15',
            'time_completed' => '2014-10-17 19:52:40',
            'time_verified' => '2014-10-17 19:53:48',
        ]);

        $cultureDurationAST12h = CultureDuration::create(['duration' => '12 hours',]);
        $cultureDurationAST24h = CultureDuration::create(['duration' => '24 hours',]);
        $cultureDurationAST36h = CultureDuration::create(['duration' => '36 hours',]);
        $cultureDurationAST48h = CultureDuration::create(['duration' => '48 hours',]);
        $cultureDurationAST60h = CultureDuration::create(['duration' => '60 hours',]);
        $cultureDurationAST72h = CultureDuration::create(['duration' => '72 hours',]);
        $cultureDurationAST4d = CultureDuration::create(['duration' => '4 days',]);
        $cultureDurationAST5d = CultureDuration::create(['duration' => '5 days',]);
        $cultureDurationAST6d = CultureDuration::create(['duration' => '6 days',]);
        $cultureDurationAST7d = CultureDuration::create(['duration' => '7 days',]);
        $cultureObservationAST = CultureObservation::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'culture_duration_id' => $cultureDurationAST48h->id,
            'observation' => 'NBG',
        ]);
        $cultureObservationAST = CultureObservation::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'culture_duration_id' => $cultureDurationAST5d->id,
            'observation' => 'NSG',
        ]);
        $cultureObservationAST = CultureObservation::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'culture_duration_id' => $cultureDurationAST7d->id,
            'observation' => 'SG',
        ]);

        $isolatedOrganism = IsolatedOrganism::create([
            'user_id' => $user1->id,
            'test_id' => $testAST->id,
            'organism_id' => $pneumoniae->id,
        ]);
        $isolatedOrganismOralPharyngealFlora = IsolatedOrganism::create([
            'user_id' => $user1->id,
            'test_id' => $testASTecoli->id,
            'organism_id' => $oralPharyngealFlora->id,
        ]);
        $isolatedOrganismEcoli = IsolatedOrganism::create([
            'user_id' => $user1->id,
            'test_id' => $testASToralPharyngealFlora->id,
            'organism_id' => $ecoli->id,
        ]);

        $drugSusceptibilityMeasureS = DrugSusceptibilityMeasure::create([
            'symbol' => 'S',
            'interpretation'=>'Sensitive',
        ]);
        $drugSusceptibilityMeasureI = DrugSusceptibilityMeasure::create([
            'symbol' => 'I',
            'interpretation'=>'Intermediate',
        ]);
        $drugSusceptibilityMeasureR = DrugSusceptibilityMeasure::create([
            'symbol' => 'R',
            'interpretation'=>'Resistant',
        ]);
        $drugSusceptibilityChloramphenicol = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $chloramphenicol->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        $drugSusceptibilityClindamycin = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $clindamycin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureS->id,
        ]);
        $drugSusceptibilityErythromycin = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $erythromycin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        $drugSusceptibilityTetracycline = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $tetracycline->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        $drugSusceptibilityTrimethoprim = DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganism->id,
            'drug_id' => $trimethoprim->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $amikacin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureI->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $ampicillin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $augmentin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $cefotaxime->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $ceftriaxione->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $cefuroxime->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $chloramphenicol->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureS->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $ciprofloxacin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $cotrimoxazole->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $gentamicin->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureR->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $imipenem->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureS->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $meropenem->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureI->id,
        ]);
        DrugSusceptibility::create([
            'user_id' => $user1->id,
            'isolated_organism_id' => $isolatedOrganismEcoli->id,
            'drug_id' => $peperacillintazobactam->id,
            'drug_susceptibility_measure_id' => $drugSusceptibilityMeasureI->id,
        ]);

        UnhlsTestResult::create([
            'test_id' => $testAppearanceMucoSalivary->id,
            'measure_id' => $measureAppearance->id,
            'result' => 'Muco-Salivary',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testGramStain->id,
            'measure_id' => $measureGramStain->id,
            'result' => '3+ Gram positive diplococci,1+ Gram negative cocci,<5 pmns and 5-10 epithelial cells seen.',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testZnStain->id,
            'measure_id' => $measureZnStain->id,
            'result' => 'No AFB seen',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testASToralPharyngealFlora->id,
            'measure_id' => $measureAST->id,
            'result' => '-',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testAppearanceFormed->id,
            'measure_id' => $measureAppearance->id,
            'result' => 'Formed',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testModifiedZn->id,
            'measure_id' => $measureModifiedZn->id,
            'result' => 'No Oocysts seen.',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testWetSalineIodinePrep->id,
            'measure_id' => $measureWetSalineIodinePrep->id,
            'result' => 'No Ova/cysts seen.',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testASTecoli->id,
            'measure_id' => $measureAST->id,
            'result' => 'ESBL Positive',
        ]);
        UnhlsTestResult::create([
            'test_id' => $testAST->id,
            'measure_id' => $measureAST->id,
            'result' => 'General Comment',
        ]);
    }

    public function createSpecimen(
            $testStatus,
            $specimenStatus,
            $specimenTypeID,
            $acceptor = 0, $rejector = 0, $rejectReason = ""){

        $values["specimen_type_id"] = $specimenTypeID;
        $values["specimen_status_id"] = $specimenStatus;

        if($specimenStatus == UnhlsSpecimen::ACCEPTED){
            $values["accepted_by"] = $acceptor;
            $values["time_accepted"] = date('Y-m-d H:i:s');
        }
        $specimen = UnhlsSpecimen::create($values);

        if($specimenStatus == UnhlsSpecimen::REJECTED){
            $rejection["specimen_id"] = $specimen->id;
            $rejection["rejected_by"] = $rejector;
            $rejection["rejection_reason_id"] = $rejectReason;
            $rejection["time_rejected"] = date('Y-m-d H:i:s');
            $preanalyticRejection = PreAnalyticSpecimenRejection::create($rejection);
        }
        return $specimen->id;
    }

}
