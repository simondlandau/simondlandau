		$(function() {
			
		$("#Social_Worker").change(function() {
			  $("#Social_Worker_Signature").load("getswsig.php?swid=" + $("#Social_Worker").val());
			});
			
});

$(document).ready(function() {
  $.viewMap = {
    '0' : $([]),
    '1' : $('#1'),
    '3' : $('#3')
  };
  $('#History_Eyes').change(function() {
    // hide all
    $.each($.viewMap, function() { $(this).hide(); });
    // show current
    $.viewMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.EarsMap = {
    '0' : $([]),
    '1' : $('#Ears1'),
    '3' : $('#Ears3')
  };
  $('#History_Ears').change(function() {
    // hide all
    $.each($.EarsMap, function() { $(this).hide(); });
    // show current
    $.EarsMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.NoseMap = {
    '0' : $([]),
    '1' : $('#Nose1'),
    '3' : $('#Nose3')
  };
  $('#History_Nose').change(function() {
    // hide all
    $.each($.NoseMap, function() { $(this).hide(); });
    // show current
    $.NoseMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.HeartMap = {
    '0' : $([]),
    '1' : $('#Heart1'),
    '3' : $('#Heart3')
  };
  $('#History_Heart').change(function() {
    // hide all
    $.each($.HeartMap, function() { $(this).hide(); });
    // show current
    $.HeartMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.BloodMap = {
    '0' : $([]),
    '1' : $('#Blood1'),
    '3' : $('#Blood3')
  };
  $('#History_Blood').change(function() {
    // hide all
    $.each($.BloodMap, function() { $(this).hide(); });
    // show current
    $.BloodMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.RespMap = {
    '0' : $([]),
    '1' : $('#Resp1'),
    '3' : $('#Resp3')
  };
  $('#History_Resp').change(function() {
    // hide all
    $.each($.RespMap, function() { $(this).hide(); });
    // show current
    $.RespMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.DigestiveMap = {
    '0' : $([]),
    '1' : $('#Digestive1'),
    '3' : $('#Digestive3')
  };
  $('#History_Digestive').change(function() {
    // hide all
    $.each($.DigestiveMap, function() { $(this).hide(); });
    // show current
    $.DigestiveMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.KidneyMap = {
    '0' : $([]),
    '1' : $('#Kidney1'),
    '3' : $('#Kidney3')
  };
  $('#History_Kidney').change(function() {
    // hide all
    $.each($.KidneyMap, function() { $(this).hide(); });
    // show current
    $.KidneyMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.NeuroMap = {
    '0' : $([]),
    '1' : $('#Neuro1'),
    '3' : $('#Neuro3')
  };
  $('#History_Neuro').change(function() {
    // hide all
    $.each($.NeuroMap, function() { $(this).hide(); });
    // show current
    $.NeuroMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.EndoMap = {
    '0' : $([]),
    '1' : $('#Endo1'),
    '3' : $('#Endo3')
  };
  $('#History_Endo').change(function() {
    // hide all
    $.each($.EndoMap, function() { $(this).hide(); });
    // show current
    $.EndoMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.SkinMap = {
    '0' : $([]),
    '1' : $('#Skin1'),
    '3' : $('#Skin3')
  };
  $('#History_Skin').change(function() {
    // hide all
    $.each($.SkinMap, function() { $(this).hide(); });
    // show current
    $.SkinMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.MuscleMap = {
    '0' : $([]),
    '1' : $('#Muscle1'),
    '3' : $('#Muscle3')
  };
  $('#History_Muscle').change(function() {
    // hide all
    $.each($.MuscleMap, function() { $(this).hide(); });
    // show current
    $.MuscleMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.MentalMap = {
    '0' : $([]),
    '1' : $('#Mental1'),
    '3' : $('#Mental3')
  };
  $('#History_Mental').change(function() {
    // hide all
    $.each($.MentalMap, function() { $(this).hide(); });
    // show current
    $.MentalMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.PhobiaMap = {
    '0' : $([]),
    '1' : $('#Phobia1'),
    '3' : $('#Phobia3')
  };
  $('#History_Phobia').change(function() {
    // hide all
    $.each($.PhobiaMap, function() { $(this).hide(); });
    // show current
    $.PhobiaMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.TropicalMap = {
    '0' : $([]),
    '1' : $('#Tropical1'),
    '3' : $('#Tropical3')
  };
  $('#History_Tropical').change(function() {
    // hide all
    $.each($.TropicalMap, function() { $(this).hide(); });
    // show current
    $.TropicalMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.GrowthsMap = {
    '0' : $([]),
    '1' : $('#Growths1'),
    '3' : $('#Growths3')
  };
  $('#History_Growths').change(function() {
    // hide all
    $.each($.GrowthsMap, function() { $(this).hide(); });
    // show current
    $.GrowthsMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.SleepMap = {
    '0' : $([]),
    '1' : $('#Sleep1'),
    '3' : $('#Sleep3')
  };
  $('#History_Sleep').change(function() {
    // hide all
    $.each($.SleepMap, function() { $(this).hide(); });
    // show current
    $.SleepMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.AllergyMap = {
    '0' : $([]),
    '1' : $('#Allergy1'),
    '3' : $('#Allergy3')
  };
  $('#History_Allergy').change(function() {
    // hide all
    $.each($.AllergyMap, function() { $(this).hide(); });
    // show current
    $.AllergyMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.MedicationMap = {
    '0' : $([]),
    '1' : $('#Medication1'),
    '3' : $('#Medication3')
  };
  $('#History_Medication').change(function() {
    // hide all
    $.each($.MedicationMap, function() { $(this).hide(); });
    // show current
    $.MedicationMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.PregnantMap = {
    '0' : $([]),
    '1' : $('#Pregnant1'),
    '3' : $('#Pregnant3')
  };
  $('#History_Pregnant').change(function() {
    // hide all
    $.each($.PregnantMap, function() { $(this).hide(); });
    // show current
    $.PregnantMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.ExerciseMap = {
    '0' : $([]),
    '1' : $('#Exercise1'),
    '3' : $('#Exercise3')
  };
  $('#History_Exercise').change(function() {
    // hide all
    $.each($.ExerciseMap, function() { $(this).hide(); });
    // show current
    $.ExerciseMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.SurgeryMap = {
    '0' : $([]),
    '1' : $('#Surgery1'),
    '3' : $('#Surgery3')
  };
  $('#History_Surgery').change(function() {
    // hide all
    $.each($.SurgeryMap, function() { $(this).hide(); });
    // show current
    $.SurgeryMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.FHeartMap = {
    '0' : $([]),
    '1' : $('#FHeart1'),
    '3' : $('#FHeart3')
  };
  $('#Family_Heart').change(function() {
    // hide all
    $.each($.FHeartMap, function() { $(this).hide(); });
    // show current
    $.FHeartMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.SeizureMap = {
    '0' : $([]),
    '1' : $('#Seizure1'),
    '3' : $('#Seizure3')
  };
  $('#Family_Seizure').change(function() {
    // hide all
    $.each($.SeizureMap, function() { $(this).hide(); });
    // show current
    $.SeizureMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.EyeMap = {
    '0' : $([]),
    '1' : $('#Eye1'),
    '3' : $('#Eye3')
  };
  $('#Family_Eye').change(function() {
    // hide all
    $.each($.EyeMap, function() { $(this).hide(); });
    // show current
    $.EyeMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.DiabetesMap = {
    '0' : $([]),
    '1' : $('#Diabetes1'),
    '3' : $('#Diabetes3')
  };
  $('#Family_Diabetes').change(function() {
    // hide all
    $.each($.DiabetesMap, function() { $(this).hide(); });
    // show current
    $.DiabetesMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.CancerMap = {
    '0' : $([]),
    '1' : $('#Cancer1'),
    '3' : $('#Cancer3')
  };
  $('#Family_Cancer').change(function() {
    // hide all
    $.each($.CancerMap, function() { $(this).hide(); });
    // show current
    $.CancerMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.AsthmaMap = {
    '0' : $([]),
    '1' : $('#Asthma1'),
    '3' : $('#Asthma3')
  };
  $('#Family_Asthma').change(function() {
    // hide all
    $.each($.AsthmaMap, function() { $(this).hide(); });
    // show current
    $.AsthmaMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.HereditaryMap = {
    '0' : $([]),
    '1' : $('#Hereditary1'),
    '3' : $('#Hereditary3')
  };
  $('#Family_Hereditary').change(function() {
    // hide all
    $.each($.HereditaryMap, function() { $(this).hide(); });
    // show current
    $.HereditaryMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.PsychiatricMap = {
    '0' : $([]),
    '1' : $('#Psychiatric1'),
    '3' : $('#Psychiatric3')
  };
  $('#Family_Psychiatric').change(function() {
    // hide all
    $.each($.PsychiatricMap, function() { $(this).hide(); });
    // show current
    $.PsychiatricMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.AddictionMap = {
    '0' : $([]),
    '1' : $('#Addiction1'),
    '3' : $('#Addiction3')
  };
  $('#Family_Addiction').change(function() {
    // hide all
    $.each($.AddictionMap, function() { $(this).hide(); });
    // show current
    $.AddictionMap[$(this).val()].show();
  }).change();
});

$(document).ready(function() {
  $.MedaidMap = {
    '0' : $([]),
    '1' : $('#Medaid1'),
    '3' : $('#Medaid3')
  };
  $('#MedAid').change(function() {
    // hide all
    $.each($.MedaidMap, function() { $(this).hide(); });
    // show current
    $.MedaidMap[$(this).val()].show();
  }).change();
});

