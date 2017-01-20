# Jirafeau

Welcome to the official Jirafeau project, an [Open-Source software](https://en.wikipedia.org/wiki/Open-source_software).

Jirafeau is a project permitting a "one-click-filesharing", which makes it possible to upload a file in a simple way and give an unique link to it.

A demonstration of the latest version is available on [jirafeau.net](http://jirafeau.net/).

![Screenshot1](http://i.imgur.com/TPjh48P.png)

## Main features

- One upload → One download link & one delete link
- Send any large files (thanks to the HTML5 file API → PHP post_max_size limit not relevant)
- Shows progression: speed, percentage and remaining upload time
- Preview content in browser (if possible)
- Optional password protection (for uploading or downloading)
- Set expiration time for downloads
- Option to self-destruct after first download
- Shortened URLs using base 64 encoding
- Maximal upload size configurable
- NO database, only use basic PHP
- Simple language support :gb: :fr: :de: :it: :nl: :ro: :sk: :hu: :cn: :gr: :ru: :es:
- File level [Deduplication](http://en.wikipedia.org/wiki/Data_deduplication) for storage optimization (does store duplicate files only once, but generate multiple links)
- Optional data encryption
- Small administration interface
- CLI script to remove expired files automatically with a cronjob
- Basic, adaptable »Terms Of Service« page
- Basic API
- Bash script to upload files via command line
- Skins

Jirafeau is a fork of the original project [Jyraphe](http://home.gna.org/jyraphe/) based on the 0.5 (stable version) with a **lot** of modifications.

As it's original project, Jirafeau is made in the [KISS](http://en.wikipedia.org/wiki/KISS_principle) way (Keep It Simple, Stupid).

Jirafeau project won't evolve to a file manager and will focus to keep a very few dependencies.

## Screenshots

- [Installation - Step 1](http://i.imgur.com/hmpT1eN.jpg)
- [Installation - Step 2](http://i.imgur.com/2e0UGKE.jpg)
- [Installation - Step 3](http://i.imgur.com/ofAjLXh.jpg)
- [Installation - Step 4](http://i.imgur.com/WXqnfqJ.jpg)
- [Upload - Step 1](http://i.imgur.com/SBmSwzJ.jpg)
- [Upload - Step 2](http://i.imgur.com/wzPkb1Z.jpg)
- [Upload - Progress](http://i.imgur.com/i6n95kv.jpg)
- [Upload - Confirmation page](http://i.imgur.com/P2oS1MY.jpg)
- [Admin Interface](http://i.imgur.com/nTdsVzn.png)

## Installation

-  [Download](https://gitlab.com/mojo42/Jirafeau/repository/archive.zip) the last version of Jirafeau from GitLab
-  Upload files on your web server
-  Don't forget to set owner of uploaded files if you need to
-  Get your web browser and go to you install location (e.g. ```http://your-web-site.org/jirafeau/```) and follow instructions
-  Some options are not configured from the minimal installation wizard, you may take a look at option documentation in ```lib/config.original.php``` and customize your ```lib/config.local.php```

Note that ```lib/config.local.php``` is auto-generated during the installation.

If you don't want to go through the installation wizard, you can just copy ```config.original.php``` to ```config.local.php``` and customize it.

## Update

### General

1. Backup you Jirafeau installation
2. Block access to Jirafeau
3. Checkout new version using the [tagged release](https://gitlab.com/mojo42/Jirafeau/tags)
4. With you browser, go to your Jirafeau root page
5. Follow installation wizard, it should propose you the same data folder
7. Go in you lib/config.local.php and lib/config.original.php to check new options

### From version 1.0 to 1.1

1. Add a rewrite rule in your web server configuration to rename file.php to f.php to make old url work again
2. Eventually change skin in »lib/config.local.php« to 'courgette'

### From version 1.1 to 1.2.0

Nothing particular

### from version 1.2.0 to 2.0.0.

1. ToS text file changed → move file from "/tos_text.php" to "/lib/tos.local.txt" and remove all HTML and PHP Tags, leaving a regular text file

## Security

```var``` directory contain all files and links. It is randomly named to limit access but you may add better protection to prevent un-authorized access to it.
You have several options:
- Configure a ```.htaccess```
- Move var folder to a place on your server which can't be directly accessed
- Disable automatic listing on your web server config or place a index.html in var's sub-directory (this is a limited solution)

If you are using Apache, you can add the following line to your configuration to prevent people to access to your ```var``` folder:

```RedirectMatch 301 ^/var-.* http://my.service.jirafeau ```

If you are using nginx, you can add the following to your $vhost.conf:

```nginx
location ~ /var-.* {
    deny all;
    return 404;
}
```

You should also remove un-necessessary write access once the installation is done (ex: configuration file).
An other obvious basic security is to let access users to the site by HTTPS.

## Server side encryption

Data encryption can be activated in options. This feature makes the server encrypt data and send the decryt key to the user (inside download URL).
The decrypt key is not stored on the server so if you loose an url, you won't be able to retrieve file content.
In case of security troubles on the server, attacker won't be able to access files.

By activating this feature, you have to be aware of few things:
-  Data encryption has a cost (cpu) and it takes more time for downloads to complete once file sent.
-  During the download, the server will decrypt on the fly (and use resource).
-  This feature needs to have the mcrypt php module.
-  File de-duplication will stop to work (as we can't compare two encrypted files).
-  Be sure your server do not log client's requests.
-  Don't forget to enable https.

In a next step, encryption will be made by the client (in javascript), see issue #10.

## License

GNU Affero General Public License version 3 (AGPLv3).

The GNU Affero General Public License can be found at https://www.gnu.org/licenses/agpl.html.

Please note: If you decide do make adaptions to the source code and run a service with these changes incorporated, 
you are required to provide a link to the source code of your version in order to obey the AGPLv3 license. 
To do so please add a link to the source (eg. a public Git repository or a download link) to the Terms of Service page.
Take a look at the FAQ to find out about how to change the ToS.

PS: If you have fixed errors or added features, then please contribute to the project and send a merge request with these changes.
 
## Contribution

If you want to contribute to project, then take a look at the git repository:

- https://gitlab.com/mojo42/Jirafeau

and the Contribution Guidelines

- https://gitlab.com/mojo42/Jirafeau/blob/master/CONTRIBUTING.md

## FAQ

### Can I add a new language in Jirafeau?

Of course ! Translations are easy to make and no technical knowledge is required.

Simply go to [Jirafeau's Weblate](https://hosted.weblate.org/projects/jirafeau/master/).

If you want to add a new language in the list, feel free to contact us or leave a comment in ticket #9.

We would like to thank all anonymous contributors on weblate. :)

### How do I upgrade my Jirafeau?

If you have installed Jirafeau using git, it's pretty simple: just make a git pull and chown/chmod files who have the owner changed.

If you have installed Jirafeau just by uploading files on your server, you can take the [last version](https://gitlab.com/mojo42/Jirafeau/repository/archive.zip), overwrite files and chown/chmod files if needed.

After upgrading, you can compare your ```lib/config.local.php``` and ```lib/config.original.php``` to see if new configuration items are available.

If you have some troubles:
- It should probably come from your ```lib/config.local.php``` (configuration syntax may have changed). Just compare it with ```lib/config.original.php```
- Check owner/permissions of your files.

Anyway you should off-course make a backup of your current installation before doing anything. :)

### How can I limit upload access?

There are two ways to limit upload access (but not download):
- you can set one or more passwords in order to access the upload interface, or/and
- you can configure a list of authorized IP ([CIDR notation](https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing#CIDR_notation)) which are allowed to access to the upload page

Check documentation of ```upload_password``` and ```upload_ip``` parameters in [lib/config.original.php](https://gitlab.com/mojo42/Jirafeau/blob/master/lib/config.original.php).

### How can I automatize the cleaning of old (expired) files?

You can call the admin.php script from the command line (CLI) with the ```clean_expired``` or ```clean_async``` commands: ```sudo -u www-data php admin.php clean_expired```.

Then the command can be placed in a cron file to automatize the process. For example:
```
# m h dom mon dow user  command
12 3    * * *   www-data  php /path/to/jirafeau/admin.php clean_expired
16 3    * * *   www-data  php /path/to/jirafeau/admin.php clean_async
```

### I have some troubles with IE

If you have some strange behavior with IE, you may configure [compatibility mode](http://feedback.dominknow.com/knowledgebase/articles/159097-internet-explorer-ie8-ie9-ie10-and-ie11-compat).

Anyway I would recommend you to use another web browser. :)

### I found a bug, what should I do?

Feel free to open a bug in the [GitLab's issues](https://gitlab.com/mojo42/Jirafeau/issues).

### How to set maximum file size?

If your browser supports HTML5 file API, you can send files as big as you want.

For browsers who does not support HTML5 file API, the limitation come from PHP configuration.
You have to set [post_max_size](https://php.net/manual/en/ini.core.php#ini.post-max-size) and [upload_max_filesize](https://php.net/manual/en/ini.core.php#ini.upload-max-filesize) in your php configuration.

If you don't want to allow unlimited upload size, you can still setup a maximal file size in Jirafeau's setting (see ```maximal_upload_size``` in your configuration)

### How can I edit an option?

Documentation of all default options are located in [lib/config.original.php](https://gitlab.com/mojo42/Jirafeau/blob/master/lib/config.original.php).
If you want to change an option, just edit your ```lib/config.local.php```.

### How can I change the Terms of Service?

The license text on the "Terms of Service" page, which is shipped with the default installation, is based on the »[Open Source Initiative Terms of Service](https://opensource.org/ToS)«.

To change this text simply copy the file [/lib/tos.original.txt](https://gitlab.com/mojo42/Jirafeau/blob/master/lib/tos.original.txt), rename it to ```/lib/tos.local.txt``` and adapt it to your own needs.

If you update the installation, then only the ```tos.original.txt``` file may change eventually, not your ```tos.local.txt``` file.

### How can I access the admin interface?

Just go to ```/admin.php```.

### How can I use the scripting interface (API)?

Simply go to ```/script.php``` with your web browser.

### My downloads are incomplete or my uploads fails

Be sure your PHP installation is not using safe mode, it may cause timeouts.

If you're using nginx, you might need to increase `client_max_body_size` or remove the restriction altogether. In your nginx.conf:

```nginx
http {
    # disable max upload size
    client_max_body_size 0;
    # add timeouts for very large uploads
    client_header_timeout 30m;
    client_body_timeout 30m;
}
```

### How can I monitor the use of my Jirafeau instance?

You may use Munin and simple scripts to collect the number of files in the Jirafeau instance as well as the disk space occupied by all the files. You can consult this [web page](https://blog.bandinelli.net/index.php?post/2016/05/15/Scripts-Munin-pour-Jirafeau).

### Why forking?

The original project seems not to be continued anymore and I prefer to add more features and increase security from a stable version.

### What can we expect in the future?

Check [issues](https://gitlab.com/mojo42/Jirafeau/issues) to check open bugs and incoming new stuff. :)

### What about this file deduplication thing?

Jirafeau uses a very simple file level deduplication for storage optimization.

This mean that if some people upload several times the same file, this will only store one time the file and increment a counter.

If someone use his/her delete link or an admin cleans expired links, this will decrement the counter corresponding to the file.

When the counter falls to zero, the file is destroyed.

### What is the difference between "delete link" and "delete file and links" in admin interface?

As explained in the previous question, files with the same md5 hash are not duplicated and a reference counter stores the number of links pointing to a single file.
So:
- The button "delete link" will delete the reference to the file but might not destroy the file.
- The button "delete file and links" will delete all references pointing to the file and will destroy the file.

### How to contact someone from Jirafeau?

Feel free to create an issue if you found a bug.

## Release notes

### Version 1.0

The very first version of Jirafeau after the fork of Jyraphe.

- Security fix
- Keep uploader's ip
- Delete link for each upload
- No more clear text password storage
- Simple langage support
- Add an admin interface
- New Design
- Add term of use
- New path system to manage large number of files
- New option to show a page at download time
- Add option to activate or not preview mode

### Version 1.1

- New skins
- Add optional server side encryption
- Unlimited file size upload using HTML5 file API
- Show speed and estimated time during upload
- A lot of fixes
- A lot of new langages
- Small API to upload files
- Limit access to Jirafeau using IP, mask, passwords
- Manage (some) proxy headers
- Configure your maximal upload size
- Configure file's lifetime durations
- Preview URL
- Get Jirafeau's version in admin interface

## Version 1.2.0

- Change versioning semantic
- A lof of translation contributions
- Fix javascript MIME type
- Show download in admin panel
- Default expiration date set to 'month'
- New expiration date: 'quarter'
- Small other fixes

## Version 2.0.0

- ToS refactoring (see update notes !)
- You can now set a title to Jirafeau in options
- A lot of documentation improvements
- Code refactoring & bugfixes
- Add version to bash script
- A lot of documentation improvements
- Code refactoring & bug fixes
- 
