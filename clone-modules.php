<?php

$githubURL = "https://github.com/CuBoulder/";

// Clone Theme
if( is_dir('./themes/custom/ucb2021_base') ){
  echo "Theme already cloned, skipping... \n";
}
else{
  echo "Cloning Theme... \n";
  shell_exec("git clone {$githubURL}ucb2021_base ./themes/custom/ucb2021_base 2>&1");
}
// Clone Profile
if( is_dir('./profiles/ucb2021_profile') ){
  echo "Profile already cloned, skipping... \n";
}
else{
  echo "Cloning Profile... \n";
  shell_exec("git clone {$githubURL}ucb2021_profile ./profiles/ucb2021_profile 2>&1");
}

// attempt to create the ./modules/custom directory
if (!is_dir('./modules/custom')) {
  echo "Creating modules/custom directory \n";
  mkdir('./modules/custom', 0755, true);
}

// clone the modules in to the custom directory
$composer = file_get_contents("./composer.json");
$res =  json_decode($composer, true);

// skip first index since that's the composer package
for( $i = 1; $i < count( $res['repositories'] ); $i++ ){
  preg_match( '/CuBoulder\/(.*?)\.git/', $res['repositories'][$i]['url'], $match);
  $package = $match[1];
  // clone the modules
  if( is_dir("./modules/custom/{$package}") ){
    echo "Module {$package} already cloned, skipping... \n";
  }
  else{
    echo "Cloning module {$package}... \n";
    shell_exec("git clone {$githubURL}{$package} ./modules/custom/{$package} 2>&1");
  }
}
?>