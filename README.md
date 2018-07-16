# videopedia

###  <a name="recur_step"></a>To be executed on new mp4 addition 

* mp4.php             :  update newly added mp4 list and its data and also calls search_list.php for suggestion creation
* 1.bat               :  creates poster for mp4 files if poster not exists

### Only one execution at beginning 

* mp4_list.php        :  list all mp4 files and initialize its data


###  Other important files 

* search_list.php     :  help in suggestion creation and also be explicitly called
* content_all.php     :  list all mp4 of directory in webpage
* content_single.php  :  to play a single mp4 file in webpage
* header.php          :  header of webpage
* index.php           :  first webpage
* livesearch.php      :  to forward suggestion to webpage
* mplayer.exe         :  helps in poster creation from mp4 files
* update_view.php     :  to increase no of views of mp4
* views.xml           :  list of all mp4 and its view and play time
* links.xml           :  list of all suggestions

## Adding new directory for videos

* create a directory in videos folder or its subfolder.
* copy single.php and all.php from another folder
* [recur_step](### To be executed on new mp4 addition )Follow these steps
* add link in navbar of header.php .
   
