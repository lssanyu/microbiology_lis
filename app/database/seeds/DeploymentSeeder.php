<?php

class DeploymentSeeder extends DatabaseSeeder
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

        $specimenTypeSputum = SpecimenType::create(["name" => "Sputum"]);

        $testTypeAST = TestType::create([
                "name" => "Culture and Sensitivity",
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

        $cBCMeasureID = [];

        $measureWBC = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "WBC", "unit" => "x10³/µL"]);
        $measureRBC = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "RBC", "unit" => "x10⁶/µL"]);
        $measureHGB = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "HGB", "unit" => "g/dL"]);
        $measureHCT = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "HCT", "unit" => "%"]);
        $measureMCV = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MCV", "unit" => "fL"]);
        $measureMCH = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MCH", "unit" => "pg"]);
        $measureMCHC = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MCHC", "unit" => "g/dL"]);
        $measurePLT = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "PLT", "unit" => "x10³/µL"]);
        $measureRDWSD = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "RDW-SD", "unit" => "fL"]);
        $measureRDWCV = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "RDW-CV", "unit" => "%"]);
        $measurePDW = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "PDW", "unit" => "fL"]);
        $measureMPV = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MPV", "unit" => "fL"]);
        $measurePLCR = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "P-LCR", "unit" => "%"]);
        $measurePCT = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "PCT", "unit" => "%"]);
        $measureNEUThash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "NEUT#", "unit" => "x10³/µL"]);
        $measureLYMPHhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "LYMPH#", "unit" => "x10³/µL"]);
        $measureMONOhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MONO#", "unit" => "x10³/µL"]);
        $measureEOhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "EO#", "unit" => "x10³/µL"]);
        $measureBASOhash = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "BASO#", "unit" => "x10³/µL"]);
        $measureNEUTpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "NEUT%", "unit" => "%"]);
        $measureLYMPHpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "LYMPH%", "unit" => "%"]);
        $measureMONOpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "MONO%", "unit" => "%"]);
        $measureEOpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "EO%", "unit" => "%"]);
        $measureBASOpercent = Measure::create(["measure_type_id" => Measure::NUMERIC,
            "name" => "BASO%", "unit" => "%"]);

        $cBCMeasureID[] = $measureWBC->id;
        $cBCMeasureID[] = $measureRBC->id;
        $cBCMeasureID[] = $measureHGB->id;
        $cBCMeasureID[] = $measureHCT->id;
        $cBCMeasureID[] = $measureMCV->id;
        $cBCMeasureID[] = $measureMCH->id;
        $cBCMeasureID[] = $measureMCHC->id;
        $cBCMeasureID[] = $measurePLT->id;
        $cBCMeasureID[] = $measureRDWSD->id;
        $cBCMeasureID[] = $measureRDWCV->id;
        $cBCMeasureID[] = $measurePDW->id;
        $cBCMeasureID[] = $measureMPV->id;
        $cBCMeasureID[] = $measurePLCR->id;
        $cBCMeasureID[] = $measurePCT->id;
        $cBCMeasureID[] = $measureNEUThash->id;
        $cBCMeasureID[] = $measureLYMPHhash->id;
        $cBCMeasureID[] = $measureMONOhash->id;
        $cBCMeasureID[] = $measureEOhash->id;
        $cBCMeasureID[] = $measureBASOhash->id;
        $cBCMeasureID[] = $measureNEUTpercent->id;
        $cBCMeasureID[] = $measureLYMPHpercent->id;
        $cBCMeasureID[] = $measureMONOpercent->id;
        $cBCMeasureID[] = $measureEOpercent->id;
        $cBCMeasureID[] = $measureBASOpercent->id;


        $testTypeCBC = TestType::create(array("name" => "CBC", "test_category_id" => $lab_section_hematology->id,
            "orderable_test" => 1));

        /* testtype_specimentypes table */
        DB::table('testtype_specimentypes')->insert(
            ["test_type_id" => $testTypeCBC->id, "specimen_type_id" => 23]);

        /* TestType Measure table */
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureWBC->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureRBC->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureHGB->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureHCT->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMCV->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMCH->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMCHC->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePLT->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureRDWSD->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureRDWCV->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePDW->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMPV->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePLCR->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measurePCT->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureNEUThash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureLYMPHhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMONOhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureEOhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureBASOhash->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureNEUTpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureLYMPHpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureMONOpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureEOpercent->id]);
        TestTypeMeasure::create(["test_type_id" => $testTypeCBC->id, "measure_id" => $measureBASOpercent->id]);

        $measureRangeCBCGroup1 = [
            "age_min" => "0",
            "age_max" => "0.01923",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,12,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,16,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup2 = [
            "age_min" => "0.01923",
            "age_max" => "0.08333",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup3 = [
            "age_min" => "0.08333",
            "age_max" => "1",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup4 = [
            "age_min" => "1",
            "age_max" => "12",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup5 = [
            "age_min" => "12",
            "age_max" => "60",
            "gender" => MeasureRange::MALE,
            "range_lower" => [3,2.5,13,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup6 = [
            "age_min" => "12",
            "age_max" => "60",
            "gender" => MeasureRange::FEMALE,
            "range_lower" => [4,2.5,12,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [11,5.5,14,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];
        $measureRangeCBCGroup7 = [
            "age_min" => "60",
            "age_max" => "999",
            "gender" => MeasureRange::BOTH,
            "range_lower" => [3,2.5,8,26,86,26,31,50,37,11,9,9,13,0.17,1.5,1,0,0,0,37,20,0,0,0],
            "range_upper" => [15,5.5,17,50,110,38,37,400,54,16,17,13,43,0.35,7,3.7,0.7,0.4,0.1,72,50,14,6,1],
            ];

        for ($i = 0; $i <= 23; $i++) {
            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup1["age_min"],
                "age_max" => $measureRangeCBCGroup1["age_max"],
                "gender" => $measureRangeCBCGroup1["gender"],
                "range_lower" => $measureRangeCBCGroup1["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup1["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup2["age_min"],
                "age_max" => $measureRangeCBCGroup2["age_max"],
                "gender" => $measureRangeCBCGroup2["gender"],
                "range_lower" => $measureRangeCBCGroup2["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup2["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup3["age_min"],
                "age_max" => $measureRangeCBCGroup3["age_max"],
                "gender" => $measureRangeCBCGroup3["gender"],
                "range_lower" => $measureRangeCBCGroup3["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup3["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup4["age_min"],
                "age_max" => $measureRangeCBCGroup4["age_max"],
                "gender" => $measureRangeCBCGroup4["gender"],
                "range_lower" => $measureRangeCBCGroup4["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup4["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup5["age_min"],
                "age_max" => $measureRangeCBCGroup5["age_max"],
                "gender" => $measureRangeCBCGroup5["gender"],
                "range_lower" => $measureRangeCBCGroup5["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup5["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup6["age_min"],
                "age_max" => $measureRangeCBCGroup6["age_max"],
                "gender" => $measureRangeCBCGroup6["gender"],
                "range_lower" => $measureRangeCBCGroup6["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup6["range_upper"][$i]
            ]);

            $measureRange = MeasureRange::create([
                "measure_id" => $cBCMeasureID[$i],
                "age_min" => $measureRangeCBCGroup7["age_min"],
                "age_max" => $measureRangeCBCGroup7["age_max"],
                "gender" => $measureRangeCBCGroup7["gender"],
                "range_lower" => $measureRangeCBCGroup7["range_lower"][$i],
                "range_upper" => $measureRangeCBCGroup7["range_upper"][$i]
            ]);
        }
    }
}
