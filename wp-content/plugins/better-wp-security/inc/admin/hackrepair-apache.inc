# Begin HackRepair.com Blacklist
RewriteEngine on
#Block comment spammers, bad bots and some proxies
RewriteCond %{REMOTE_HOST} 12.226.240.248 [OR]
RewriteCond %{REMOTE_HOST} 24.111.102.26 [OR]
RewriteCond %{REMOTE_HOST} 24.117.121.113 [OR]
RewriteCond %{REMOTE_HOST} 65.30.216.140 [OR]
RewriteCond %{REMOTE_HOST} 67.87.64.23 [OR]
RewriteCond %{REMOTE_HOST} 68.12.149.198 [OR]
RewriteCond %{REMOTE_HOST} 69.139.167.203 [OR]
RewriteCond %{REMOTE_HOST} 74.95.182.57 [OR]
RewriteCond %{REMOTE_HOST} 91.121.3.29 [OR]
RewriteCond %{REMOTE_HOST} 203.94.229.227 [OR]
RewriteCond %{REMOTE_HOST} 208.96.122.142 [OR]
RewriteCond %{REMOTE_HOST} 210.0.141.247 [OR]
RewriteCond %{REMOTE_HOST} 210.197.97.67 [OR]
RewriteCond %{REMOTE_HOST} 212.179.127.188 [OR]
RewriteCond %{REMOTE_HOST} 216.246.60.183 [OR]
RewriteCond %{REMOTE_HOST} 220.156.189.233 [OR]
RewriteCond %{REMOTE_HOST} 222.36.12.42 [OR]
# Abuse Agent Blocking
RewriteCond %{HTTP_USER_AGENT} ^BlackWidow [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Bolt\ 0 [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Bot\ mailto:craftbot\@yahoo\.com [NC,OR]
RewriteCond %{HTTP_USER_AGENT} CazoodleBot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^ChinaClaw [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Custo [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Default\ Browser\ 0 [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^DIIbot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^DISCo [NC,OR]
RewriteCond %{HTTP_USER_AGENT} discobot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Download\ Demon [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^eCatch [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ecxi [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^EirGrabber [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^EmailCollector [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^EmailSiphon [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^EmailWolf [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Express\ WebPictures [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^ExtractorPro [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^EyeNetIE [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^FlashGet [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^GetRight [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^GetWeb! [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Go!Zilla [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Go-Ahead-Got-It [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^GrabNet [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Grafula [NC,OR]
RewriteCond %{HTTP_USER_AGENT} GT::WWW [NC,OR]
RewriteCond %{HTTP_USER_AGENT} heritrix [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^HMView [NC,OR]
RewriteCond %{HTTP_USER_AGENT} HTTP::Lite [NC,OR]
RewriteCond %{HTTP_USER_AGENT} HTTrack [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ia_archiver [NC,OR]
RewriteCond %{HTTP_USER_AGENT} IDBot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} id-search [NC,OR]
RewriteCond %{HTTP_USER_AGENT} id-search\.org [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Image\ Stripper [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Image\ Sucker [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Indy\ Library [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^InterGET [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Internet\ Ninja [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^InternetSeer\.com [NC,OR]
RewriteCond %{HTTP_USER_AGENT} IRLbot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ISC\ Systems\ iRc\ Search\ 2\.1 [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Java [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^JetCar [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^JOC\ Web\ Spider [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^larbin [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^LeechFTP [NC,OR]
RewriteCond %{HTTP_USER_AGENT} libwww [NC,OR]
RewriteCond %{HTTP_USER_AGENT} libwww-perl [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Link [NC,OR]
RewriteCond %{HTTP_USER_AGENT} LinksManager.com_bot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} linkwalker [NC,OR]
RewriteCond %{HTTP_USER_AGENT} lwp-trivial [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Mass\ Downloader [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Maxthon$ [NC,OR]
RewriteCond %{HTTP_USER_AGENT} MFC_Tear_Sample [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^microsoft\.url [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Microsoft\ URL\ Control [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^MIDown\ tool [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Mister\ PiX [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Missigua\ Locator [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Mozilla\.*Indy [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Mozilla\.*NEWT [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^MSFrontPage [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Navroad [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^NearSite [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^NetAnts [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^NetSpider [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Net\ Vampire [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^NetZIP [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Nutch [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Octopus [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Offline\ Explorer [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Offline\ Navigator [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^PageGrabber [NC,OR]
RewriteCond %{HTTP_USER_AGENT} panscient.com [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Papa\ Foto [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^pavuk [NC,OR]
RewriteCond %{HTTP_USER_AGENT} PECL::HTTP [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^PeoplePal [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^pcBrowser [NC,OR]
RewriteCond %{HTTP_USER_AGENT} PHPCrawl [NC,OR]
RewriteCond %{HTTP_USER_AGENT} PleaseCrawl [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^psbot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^RealDownload [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^ReGet [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Rippers\ 0 [NC,OR]
RewriteCond %{HTTP_USER_AGENT} SBIder [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^SeaMonkey$ [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^sitecheck\.internetseer\.com [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^SiteSnagger [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^SmartDownload [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Snoopy [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Steeler [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^SuperBot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^SuperHTTP [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Surfbot [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^tAkeOut [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Teleport\ Pro [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Toata\ dragostea\ mea\ pentru\ diavola [NC,OR]
RewriteCond %{HTTP_USER_AGENT} URI::Fetch [NC,OR]
RewriteCond %{HTTP_USER_AGENT} urllib [NC,OR]
RewriteCond %{HTTP_USER_AGENT} User-Agent [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^VoidEYE [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Web\ Image\ Collector [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Web\ Sucker [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Web\ Sucker [NC,OR]
RewriteCond %{HTTP_USER_AGENT} webalta [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebAuto [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^[Ww]eb[Bb]andit [NC,OR]
RewriteCond %{HTTP_USER_AGENT} WebCollage [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebCopier [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebFetch [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebGo\ IS [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebLeacher [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebReaper [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebSauger [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Website\ eXtractor [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Website\ Quester [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebStripper [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebWhacker [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WebZIP [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Wells\ Search\ II [NC,OR]
RewriteCond %{HTTP_USER_AGENT} WEP\ Search [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Wget [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Widow [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WWW-Mechanize [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^WWWOFFLE [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Xaldon\ WebSpider [NC,OR]
RewriteCond %{HTTP_USER_AGENT} Yandex [NC,OR]
RewriteCond %{HTTP_USER_AGENT} zermelo [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Zeus [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ^Zeus\.*Webster [NC,OR]
RewriteCond %{HTTP_USER_AGENT} ZyBorg [NC]
RewriteRule ^.* - [F,L]
# Abuse bot blocking rule end
order allow,deny
allow from all
# Start Custom Blocks
# Bluecoat
deny from 8.21.4.254
deny from 65.46.48.192/30
deny from 65.160.238.176/28
deny from 85.92.222.0/24
deny from 206.51.36.0/22
deny from 216.52.23.0/24
# cyveillance (already blocked 38.*)
deny from 38.100.19.8/29
deny from 38.100.21.0/24
deny from 38.100.41.64/26
deny from 38.105.71.0/25
deny from 38.105.83.0/27
deny from 38.112.21.140/30
deny from 38.118.42.32/29
deny from 65.213.208.128/27
deny from 65.222.176.96/27
deny from 65.222.185.72/29
# Cyberpatrol
deny from 38.103.17.160/27
# Internet Identity - Anti-Phishing
deny from 66.113.96.0/20
deny from 70.35.113.192/27
# Ironport
deny from 204.15.80.0/22
# Lightspeed Systems Security
deny from 66.17.15.128/26
deny from 69.84.207.32/27
deny from 69.84.207.128/25
# Layered Technologies
deny from 72.36.128.0/17
deny from 72.232.0.0/16
deny from 72.233.0.0/17
deny from 216.32.0.0/14
# M86
deny from 67.192.231.224/29
deny from 208.90.236.0/22
# McAfee-Secure-Computing
deny from 69.48.241.64/26
deny from 80.66.0.0/19
deny from 192.55.214.0/24
deny from 207.67.117.0/24
# Phish-Inspector.com
deny from 209.147.127.208/28
# Prescient Software, Inc. Phishmongers
deny from 198.186.190.0/23
deny from 198.186.192.0/23
deny from 198.186.194.0/24
# PSI network
deny from 38.0.0.0/8
# urlfilterdb
deny from 207.210.99.32/29
# websense-in.car1.sandiego1.level3.net
deny from 4.53.120.22
# Websense
deny from 66.194.6.0/24
deny from 67.117.201.128/28
deny from 69.67.32.0/20
deny from 131.191.87.0/24
deny from 204.15.64.0/21
deny from 208.80.192.0/21
deny from 212.62.26.64/27
deny from 213.168.226.0/24
deny from 213.168.241.0/30
deny from 213.168.242.0/30
deny from 213.236.150.16/28
# Yandex
deny from 77.88.0.0/18
deny from 77.88.22.0/23
deny from 77.88.24.0/21
deny from 77.88.24.0/22
deny from 77.88.28.0/22
deny from 77.88.36.0/23
deny from 77.88.42.0/23
deny from 77.88.44.0/24
deny from 77.88.50.0/23
deny from 87.250.224.0/19
deny from 87.250.230.0/23
deny from 87.250.252.0/22
deny from 93.158.128.0/18
deny from 93.158.137.0/24
deny from 93.158.144.0/21
deny from 93.158.144.0/23
deny from 93.158.146.0/23
deny from 93.158.148.0/22
deny from 95.108.128.0/17
deny from 95.108.128.0/24
deny from 95.108.152.0/22
deny from 95.108.216.0/23
deny from 95.108.240.0/21
deny from 95.108.248.0/23
deny from 178.154.128.0/17
deny from 178.154.160.0/22
deny from 178.154.164.0/23
deny from 199.36.240.0/22
deny from 213.180.192.0/19
deny from 213.180.204.0/24
deny from 213.180.206.0/23
deny from 213.180.209.0/24
deny from 213.180.218.0/23
deny from 213.180.220.0/23
# End HackRepair.com Blacklist