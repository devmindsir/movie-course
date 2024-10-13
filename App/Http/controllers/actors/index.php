<?php

//!Fetch Function
use App\Models\Actor;

//!actors
$actors = (new Actor)->all();

view('actors/index', ['actors' => $actors]);
