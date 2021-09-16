#!/bin/zsh

set -e;

githubURL="https://github.com/CuBoulder/";

# Add any custom modules to the list here
remoteRepos=(
  ucb_shortcodes
  ucb_custom_paragraphs
  ucb_custom_page_types
);

module_dir="./modules/custom/";

# clone the theme
if [ -d "./themes/custom/ucb2021_base" ]; then
  echo -e "Theme already cloned, skipping...\n";
else
  git clone ${githubURL}ucb2021_base ./themes/custom/ucb2021_base;
fi

# clone the profile
if [ -d "./profiles/ucb_2021_profile" ]; then
  echo -e "Profile already cloned, skipping...\n";
else
  git clone ${githubURL}ucb_2021_profile ./profiles/ucb_2021_profile;
fi

#clone the modules in to the custom directory
mkdir -p modules/custom;
for gitRepo in $remoteRepos
do
  localRepoDir=$(echo ${module_dir}${gitRepo});
  if [ -d $localRepoDir ]; then 	
		echo -e "Directory $localRepoDir already exits, skipping ...\n"
	else
    git clone ${githubURL}${gitRepo} $localRepoDir;
	fi
done