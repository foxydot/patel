# Begin HackRepair.com Blacklist
	if ($http_user_agent ~* "^BlackWidow"){
		return 403;
		}
	if ($http_user_agent ~ "^Bolt"){
		return 403;
		}
	if ($http_user_agent ~* "CazoodleBot"){
		return 403;
		}
	if ($http_user_agent ~* "^ChinaClaw"){
		return 403;
		}
	if ($http_user_agent ~* "^Custo"){
		return 403;
		}
	if ($http_user_agent ~ "^Default"){
		return 403;
		}
	if ($http_user_agent ~* "^DIIbot"){
		return 403;
		}
	if ($http_user_agent ~* "^DISCo"){
		return 403;
		}
	if ($http_user_agent ~* "discobot"){
		return 403;
		}
	if ($http_user_agent ~* "^eCatch"){
		return 403;
		}
	if ($http_user_agent ~* "ecxi"){
		return 403;
		}
	if ($http_user_agent ~* "^EirGrabber"){
		return 403;
		}
	if ($http_user_agent ~* "^EmailCollector"){
		return 403;
		}
	if ($http_user_agent ~* "^EmailSiphon"){
		return 403;
		}
	if ($http_user_agent ~* "^EmailWolf"){
		return 403;
		}
	if ($http_user_agent ~* "^ExtractorPro"){
		return 403;
		}
	if ($http_user_agent ~* "^EyeNetIE"){
		return 403;
		}
	if ($http_user_agent ~* "^FlashGet"){
		return 403;
		}
	if ($http_user_agent ~* "^GetRight"){
		return 403;
		}
	if ($http_user_agent ~* "^GetWeb!"){
		return 403;
		}
	if ($http_user_agent ~* "^Go!Zilla"){
		return 403;
		}
	if ($http_user_agent ~* "^Go-Ahead-Got-It"){
		return 403;
		}
	if ($http_user_agent ~* "^GrabNet"){
		return 403;
		}
	if ($http_user_agent ~* "^Grafula"){
		return 403;
		}
	if ($http_user_agent ~* "GT::WWW"){
		return 403;
		}
	if ($http_user_agent ~* "heritrix"){
		return 403;
		}
	if ($http_user_agent ~* "^HMView"){
		return 403;
		}
	if ($http_user_agent ~* "HTTP::Lite"){
		return 403;
		}
	if ($http_user_agent ~* "HTTrack"){
		return 403;
		}
	if ($http_user_agent ~* "ia_archiver"){
		return 403;
		}
	if ($http_user_agent ~* "IDBot"){
		return 403;
		}
	if ($http_user_agent ~* "id-search"){
		return 403;
		}
	if ($http_user_agent ~* "id-search.org"){
		return 403;
		}
	if ($http_user_agent ~* "^InterGET"){
		return 403;
		}
	if ($http_user_agent ~* "^InternetSeer.com"){
		return 403;
		}
	if ($http_user_agent ~* "IRLbot"){
		return 403;
		}
	if ($http_user_agent ~* "^Java"){
		return 403;
		}
	if ($http_user_agent ~* "^JetCar"){
		return 403;
		}
	if ($http_user_agent ~* "^larbin"){
		return 403;
		}
	if ($http_user_agent ~* "^LeechFTP"){
		return 403;
		}
	if ($http_user_agent ~* "libwww"){
		return 403;
		}
	if ($http_user_agent ~* "libwww-perl"){
		return 403;
		}
	if ($http_user_agent ~* "^Link"){
		return 403;
		}
	if ($http_user_agent ~* "LinksManager.com_bot"){
		return 403;
		}
	if ($http_user_agent ~* "linkwalker"){
		return 403;
		}
	if ($http_user_agent ~* "lwp-trivial"){
		return 403;
		}
	#ignored: condition 72
	if ($http_user_agent ~* "^Maxthon$"){
		return 403;
		}
	if ($http_user_agent ~* "MFC_Tear_Sample"){
		return 403;
		}
	if ($http_user_agent ~* "^microsoft.url"){
		return 403;
		}
	if ($http_user_agent ~ "Microsoft"){
		return 403;
		}
	if ($http_user_agent ~* "^Mozilla.*Indy"){
		return 403;
		}
	if ($http_user_agent ~* "^Mozilla.*NEWT"){
		return 403;
		}
	if ($http_user_agent ~* "^MSFrontPage"){
		return 403;
		}
	if ($http_user_agent ~* "^Navroad"){
		return 403;
		}
	if ($http_user_agent ~* "^NearSite"){
		return 403;
		}
	if ($http_user_agent ~* "^NetAnts"){
		return 403;
		}
	if ($http_user_agent ~* "^NetSpider"){
		return 403;
		}
	if ($http_user_agent ~* "^NetZIP"){
		return 403;
		}
	if ($http_user_agent ~* "^Nutch"){
		return 403;
		}
	if ($http_user_agent ~* "^Octopus"){
		return 403;
		}
	if ($http_user_agent ~* "^PageGrabber"){
		return 403;
		}
	if ($http_user_agent ~* "panscient.com"){
		return 403;
		}
	if ($http_user_agent ~* "^pavuk"){
		return 403;
		}
	if ($http_user_agent ~* "PECL::HTTP"){
		return 403;
		}
	if ($http_user_agent ~* "^PeoplePal"){
		return 403;
		}
	if ($http_user_agent ~* "^pcBrowser"){
		return 403;
		}
	if ($http_user_agent ~* "PHPCrawl"){
		return 403;
		}
	if ($http_user_agent ~* "PleaseCrawl"){
		return 403;
		}
	if ($http_user_agent ~* "^psbot"){
		return 403;
		}
	if ($http_user_agent ~* "^RealDownload"){
		return 403;
		}
	if ($http_user_agent ~* "^ReGet"){
		return 403;
		}
	if ($http_user_agent ~ "^Rippers"){
		return 403;
		}
	if ($http_user_agent ~* "SBIder"){
		return 403;
		}
	if ($http_user_agent ~* "^SeaMonkey$"){
		return 403;
		}
	if ($http_user_agent ~* "^sitecheck.internetseer.com"){
		return 403;
		}
	if ($http_user_agent ~* "^SiteSnagger"){
		return 403;
		}
	if ($http_user_agent ~* "^SmartDownload"){
		return 403;
		}
	if ($http_user_agent ~* "Snoopy"){
		return 403;
		}
	if ($http_user_agent ~* "Steeler"){
		return 403;
		}
	if ($http_user_agent ~* "^SuperBot"){
		return 403;
		}
	if ($http_user_agent ~* "^SuperHTTP"){
		return 403;
		}
	if ($http_user_agent ~* "^Surfbot"){
		return 403;
		}
	if ($http_user_agent ~* "^tAkeOut"){
		return 403;
		}
	if ($http_user_agent ~ "^Teleport"){
		return 403;
		}
	if ($http_user_agent ~ "^Toata"){
		return 403;
		}
	if ($http_user_agent ~* "URI::Fetch"){
		return 403;
		}
	if ($http_user_agent ~* "urllib"){
		return 403;
		}
	if ($http_user_agent ~* "User-Agent"){
		return 403;
		}
	if ($http_user_agent ~* "^VoidEYE"){
		return 403;
		}
	if ($http_user_agent ~* "webalta"){
		return 403;
		}
	if ($http_user_agent ~* "^WebAuto"){
		return 403;
		}
	if ($http_user_agent ~* "^[Ww]eb[Bb]andit"){
		return 403;
		}
	if ($http_user_agent ~* "WebCollage"){
		return 403;
		}
	if ($http_user_agent ~* "^WebCopier"){
		return 403;
		}
	if ($http_user_agent ~* "^WebFetch"){
		return 403;
		}
	if ($http_user_agent ~* "^WebLeacher"){
		return 403;
		}
	if ($http_user_agent ~* "^WebReaper"){
		return 403;
		}
	if ($http_user_agent ~* "^WebSauger"){
		return 403;
		}
	if ($http_user_agent ~* "^WebStripper"){
		return 403;
		}
	if ($http_user_agent ~* "^WebWhacker"){
		return 403;
		}
	if ($http_user_agent ~* "^WebZIP"){
		return 403;
		}
	if ($http_user_agent ~* "^Wget"){
		return 403;
		}
	if ($http_user_agent ~* "^Widow"){
		return 403;
		}
	if ($http_user_agent ~* "^WWW-Mechanize"){
		return 403;
		}
	if ($http_user_agent ~* "^WWWOFFLE"){
		return 403;
		}
	if ($http_user_agent ~* "Yandex"){
		return 403;
		}
	if ($http_user_agent ~* "zermelo"){
		return 403;
		}
	if ($http_user_agent ~* "^Zeus"){
		return 403;
		}
	if ($http_user_agent ~* "^Zeus.*Webster"){
		return 403;
		}
	if ($http_user_agent ~* "ZyBorg"){
		return 403;
		}
# End HackRepair.com Blacklist
