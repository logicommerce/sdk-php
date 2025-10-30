<?php

namespace SDK\Core\Enums;

/**
 * This is the mime types enumerate.
 *
 * @see Enum
 *
 * @package SDK\Core\Enums
 */
abstract class MimeType extends Enum {

    private const APPLICATION_XML = 'application/xml';

    private const AUD_AIFF = 'audio/aiff';

    private const AUD_MID = 'audio/mid';

    private const AUD_SMD = 'audio/x-smd';

    private const CA_CERT = 'application/x-x509-ca-cert';

    private const EXCEL = 'application/vnd.ms-excel';

    private const IMG_JPG = 'image/jpeg';

    private const IMG_PICT = 'image/pict';

    private const MAC_PAINT = 'image/x-macpaint';

    private const MEDIA_WEB = 'application/x-msmediaview';

    private const MS_ACCESS = 'application/msaccess';

    private const MS_ASF = 'video/x-ms-asf';

    private const OCTET_STREAM = 'application/octet-stream';

    private const ONE_NOTE = 'application/onenote';

    private const PERFMON = 'application/x-perfmon';

    private const POST_SCRIPT = 'application/postscript';

    private const POWERPOINT = 'application/vnd.ms-powerpoint';

    private const RFC822 = 'message/rfc822';

    private const TEXT_HTML = 'text/html';

    private const TEXT_PLAIN = 'text/plain';

    private const TEXT_XML = 'text/xml';

    private const TROFF = 'application/x-troff';

    private const VID_MPG = 'video/mpeg';

    private const VID_MPG_TTS = 'video/vnd.dlna.mpeg-tts';

    private const VID_QUICKTIME = 'video/quicktime';

    private const VISIO = 'application/vnd.visio';

    private const VRLM = 'x-world/x-vrml';

    private const WORD = 'application/msword';

    private const WORKS = 'application/vnd.ms-works';

    private const X_DIRECTOR = 'application/x-director';

    public const AA = "audio/audible";

    public const AAC = "audio/aac";

    public const AAF = self::OCTET_STREAM;

    public const AAX = "audio/vnd.audible.aax";

    public const AC3 = "audio/ac3";

    public const ACA = self::OCTET_STREAM;

    public const ACCDA = self::MS_ACCESS . ".addin";

    public const ACCDB = self::MS_ACCESS;

    public const ACCDC = self::MS_ACCESS . ".cab";

    public const ACCDE = self::MS_ACCESS;

    public const ACCDR = self::MS_ACCESS . ".runtime";

    public const ACCDT = self::MS_ACCESS;

    public const ACCDW = self::MS_ACCESS . ".webapplication";

    public const ACCFT = self::MS_ACCESS . ".ftemplate";

    public const ACX = "application/internet-property-stream";

    public const ADDIN = self::TEXT_XML;

    public const ADE = self::MS_ACCESS;

    public const ADOBEBRIDGE = "application/x-bridge-url";

    public const ADP = self::MS_ACCESS;

    public const ADT = "audio/vnd.dlna.adts";

    public const ADTS = "audio/aac";

    public const AFM = self::OCTET_STREAM;

    public const AI = self::POST_SCRIPT;

    public const AIF = "audio/x-aiff";

    public const AIFC = self::AUD_AIFF;

    public const AIFF = self::AUD_AIFF;

    public const AIR = "application/vnd.adobe.air-application-installer-package+zip";

    public const AMC = "application/x-mpeg";

    public const APPLICATION = "application/x-ms-application";

    public const ART = "image/x-jg";

    public const ASA = self::APPLICATION_XML;

    public const ASAX = self::APPLICATION_XML;

    public const ASCX = self::APPLICATION_XML;

    public const ASD = self::OCTET_STREAM;

    public const ASF = self::MS_ASF;

    public const ASHX = self::APPLICATION_XML;

    public const ASI = self::OCTET_STREAM;

    public const ASM = self::TEXT_PLAIN;

    public const ASMX = self::APPLICATION_XML;

    public const ASPX = self::APPLICATION_XML;

    public const ASR = self::MS_ASF;

    public const ASX = self::MS_ASF;

    public const ATOM = "application/atom+xml";

    public const AU = "audio/basic";

    public const AVI = "video/x-msvideo";

    public const AXS = "application/olescript";

    public const BAS = self::TEXT_PLAIN;

    public const BCPIO = "application/x-bcpio";

    public const BIN = self::OCTET_STREAM;

    public const BMP = "image/bmp";

    public const C = self::TEXT_PLAIN;

    public const CAB = self::OCTET_STREAM;

    public const CAF = "audio/x-caf";

    public const CALX = "application/vnd.ms-office.calx";

    public const CAT = "application/vnd.ms-pki.seccat";

    public const CC = self::TEXT_PLAIN;

    public const CD = self::TEXT_PLAIN;

    public const CDDA = self::AUD_AIFF;

    public const CDF = "application/x-cdf";

    public const CER = self::CA_CERT;

    public const CHM = self::OCTET_STREAM;

    public const APPLET = "application/x-java-applet";

    public const CLP = "application/x-msclip";

    public const CMX = "image/x-cmx";

    public const CNF = self::TEXT_PLAIN;

    public const COD = "image/cis-cod";

    public const CONFIG = self::APPLICATION_XML;

    public const CONTACT = "text/x-ms-contact";

    public const COVERAGE = self::APPLICATION_XML;

    public const CPIO = "application/x-cpio";

    public const CPP = self::TEXT_PLAIN;

    public const CRD = "application/x-mscardfile";

    public const CRL = "application/pkix-crl";

    public const CRT = self::CA_CERT;

    public const CS = self::TEXT_PLAIN;

    public const CSDPROJ = self::TEXT_PLAIN;

    public const CSH = "application/x-csh";

    public const CSPROJ = self::TEXT_PLAIN;

    public const CSS = "text/css";

    public const CSV = "text/csv";

    public const CUR = self::OCTET_STREAM;

    public const CXX = self::TEXT_PLAIN;

    public const DAT = self::OCTET_STREAM;

    public const DATASOURCE = self::APPLICATION_XML;

    public const DBPROJ = self::TEXT_PLAIN;

    public const DCR = self::X_DIRECTOR;

    public const DEF = self::TEXT_PLAIN;

    public const DEPLOY = self::OCTET_STREAM;

    public const DER = self::CA_CERT;

    public const DGML = self::APPLICATION_XML;

    public const DIB = "image/bmp";

    public const DIF = "video/x-dv";

    public const DIR = self::X_DIRECTOR;

    public const DISCO = self::TEXT_XML;

    public const DLL = "application/x-msdownload";

    public const DLL_CONFIG = self::TEXT_XML;

    public const DLM = "text/dlm";

    public const DOC = self::WORD;

    public const DOCM = "application/vnd.ms-word.document.macroEnabled.12";

    public const DOCX = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";

    public const DOT = self::WORD;

    public const DOTM = "application/vnd.ms-word.template.macroEnabled.12";

    public const DOTX = "application/vnd.openxmlformats-officedocument.wordprocessingml.template";

    public const DSP = self::OCTET_STREAM;

    public const DSW = self::TEXT_PLAIN;

    public const DTD = self::TEXT_XML;

    public const DTSCONFIG = self::TEXT_XML;

    public const DV = "video/x-dv";

    public const DVI = "application/x-dvi";

    public const DWF = "drawing/x-dwf";

    public const DWP = self::OCTET_STREAM;

    public const DXR = self::X_DIRECTOR;

    public const EML = self::RFC822;

    public const EMZ = self::OCTET_STREAM;

    public const EOT = self::OCTET_STREAM;

    public const EPS = self::POST_SCRIPT;

    public const ETL = "application/etl";

    public const ETX = "text/x-setext";

    public const EVY = "application/envoy";

    public const EXE = self::OCTET_STREAM;

    public const EXE_CONFIG = self::TEXT_XML;

    public const FDF = "application/vnd.fdf";

    public const FIF = "application/fractals";

    public const FILTERS = self::APPLICATION_XML;

    public const FLA = self::OCTET_STREAM;

    public const FLR = self::VRLM;

    public const FLV = "video/x-flv";

    public const FSSCRIPT = "application/fsharp-script";

    public const FSX = "application/fsharp-script";

    public const GENERICTEST = self::APPLICATION_XML;

    public const GIF = "image/gif";

    public const GROUP = "text/x-ms-group";

    public const GSM = "audio/x-gsm";

    public const GTAR = "application/x-gtar";

    public const GZ = "application/x-gzip";

    public const H = self::TEXT_PLAIN;

    public const H323 = "text/h323";

    public const HDF = "application/x-hdf";

    public const HDML = "text/x-hdml";

    public const HHC = "application/x-oleobject";

    public const HHK = self::OCTET_STREAM;

    public const HHP = self::OCTET_STREAM;

    public const HLP = "application/winhlp";

    public const HPP = self::TEXT_PLAIN;

    public const HQX = "application/mac-binhex40";

    public const HTA = "application/hta";

    public const HTC = "text/x-component";

    public const HTM = self::TEXT_HTML;

    public const HTML = self::TEXT_HTML;

    public const HTT = "text/webviewhtml";

    public const HXA = self::APPLICATION_XML;

    public const HXC = self::APPLICATION_XML;

    public const HXD = self::OCTET_STREAM;

    public const HXE = self::APPLICATION_XML;

    public const HXF = self::APPLICATION_XML;

    public const HXH = self::OCTET_STREAM;

    public const HXI = self::OCTET_STREAM;

    public const HXK = self::APPLICATION_XML;

    public const HXQ = self::OCTET_STREAM;

    public const HXR = self::OCTET_STREAM;

    public const HXS = self::OCTET_STREAM;

    public const HXT = self::TEXT_HTML;

    public const HXV = self::APPLICATION_XML;

    public const HXW = self::OCTET_STREAM;

    public const HXX = self::TEXT_PLAIN;

    public const I = self::TEXT_PLAIN;

    public const ICO = "image/x-icon";

    public const ICS = self::OCTET_STREAM;

    public const IDL = self::TEXT_PLAIN;

    public const IEF = "image/ief";

    public const III = "application/x-iphone";

    public const INC = self::TEXT_PLAIN;

    public const INF = self::OCTET_STREAM;

    public const INL = self::TEXT_PLAIN;

    public const INS = "application/x-internet-signup";

    public const IPA = "application/x-itunes-ipa";

    public const IPG = "application/x-itunes-ipg";

    public const IPPROJ = self::TEXT_PLAIN;

    public const IPSW = "application/x-itunes-ipsw";

    public const IQY = "text/x-ms-iqy";

    public const ISP = "application/x-internet-signup";

    public const ITE = "application/x-itunes-ite";

    public const ITLP = "application/x-itunes-itlp";

    public const ITMS = "application/x-itunes-itms";

    public const ITPC = "application/x-itunes-itpc";

    public const IVF = "video/x-ivf";

    public const JAR = "application/java-archive";

    public const JAVA = self::OCTET_STREAM;

    public const JCK = "application/liquidmotion";

    public const JCZ = "application/liquidmotion";

    public const JFIF = "image/pjpeg";

    public const JNLP = "application/x-java-jnlp-file";

    public const JPB = self::OCTET_STREAM;

    public const JPE = self::IMG_JPG;

    public const JPEG = self::IMG_JPG;

    public const JPG = self::IMG_JPG;

    public const JS = "application/x-javascript";

    public const JSON = "application/json";

    public const JSX = "text/jscript";

    public const JSXBIN = self::TEXT_PLAIN;

    public const LATEX = "application/x-latex";

    public const LIBRARY_MS = "application/windows-library+xml";

    public const LIT = "application/x-ms-reader";

    public const LOADTEST = self::APPLICATION_XML;

    public const LPK = self::OCTET_STREAM;

    public const LSF = "video/x-la-asf";

    public const LST = self::TEXT_PLAIN;

    public const LSX = "video/x-la-asf";

    public const LZH = self::OCTET_STREAM;

    public const M13 = self::MEDIA_WEB;

    public const M14 = self::MEDIA_WEB;

    public const M1V = self::VID_MPG;

    public const M2T = self::VID_MPG_TTS;

    public const M2TS = self::VID_MPG_TTS;

    public const M2V = self::VID_MPG;

    public const M3U = "audio/x-mpegurl";

    public const M3U8 = "audio/x-mpegurl";

    public const M4A = "audio/m4a";

    public const M4B = "audio/m4b";

    public const M4P = "audio/m4p";

    public const M4R = "audio/x-m4r";

    public const M4V = "video/x-m4v";

    public const MAC = self::MAC_PAINT;

    public const MAK = self::TEXT_PLAIN;

    public const MAN = self::TROFF . "-man";

    public const MANIFEST = "application/x-ms-manifest";

    public const MAP = self::TEXT_PLAIN;

    public const MASTER = self::APPLICATION_XML;

    public const MDA = self::MS_ACCESS;

    public const MDB = "application/x-msaccess";

    public const MDE = self::MS_ACCESS;

    public const MDP = self::OCTET_STREAM;

    public const ME = self::TROFF . "-me";

    public const MFP = "application/x-shockwave-flash";

    public const MHT = self::RFC822;

    public const MHTML = self::RFC822;

    public const MID = self::AUD_MID;

    public const MIDI = self::AUD_MID;

    public const MIX = self::OCTET_STREAM;

    public const MK = self::TEXT_PLAIN;

    public const MMF = "application/x-smaf";

    public const MNO = self::TEXT_XML;

    public const MNY = "application/x-msmoney";

    public const MOD = self::VID_MPG;

    public const MOV = self::VID_QUICKTIME;

    public const MOVIE = "video/x-sgi-movie";

    public const MP2 = self::VID_MPG;

    public const MP2V = self::VID_MPG;

    public const MP3 = "audio/mpeg";

    public const MP4 = "video/mp4";

    public const MP4V = "video/mp4";

    public const MPA = self::VID_MPG;

    public const MPE = self::VID_MPG;

    public const MPEG = self::VID_MPG;

    public const MPF = "application/vnd.ms-mediapackage";

    public const MPG = self::VID_MPG;

    public const MPP = "application/vnd.ms-project";

    public const MPV2 = self::VID_MPG;

    public const MQV = self::VID_QUICKTIME;

    public const MS = self::TROFF . "-ms";

    public const MSI = self::OCTET_STREAM;

    public const MSO = self::OCTET_STREAM;

    public const MTS = self::VID_MPG_TTS;

    public const MTX = self::APPLICATION_XML;

    public const MVB = self::MEDIA_WEB;

    public const MVC = "application/x-miva-compiled";

    public const MXP = "application/x-mmxp";

    public const NC = "application/x-netcdf";

    public const NSC = self::MS_ASF;

    public const NWS = self::RFC822;

    public const OCX = self::OCTET_STREAM;

    public const ODA = "application/oda";

    public const ODC = "text/x-ms-odc";

    public const ODH = self::TEXT_PLAIN;

    public const ODL = self::TEXT_PLAIN;

    public const ODP = "application/vnd.oasis.opendocument.presentation";

    public const ODS = "application/oleobject";

    public const ODT = "application/vnd.oasis.opendocument.text";

    public const ONE = self::ONE_NOTE;

    public const ONEA = self::ONE_NOTE;

    public const ONEPKG = self::ONE_NOTE;

    public const ONETMP = self::ONE_NOTE;

    public const ONETOC = self::ONE_NOTE;

    public const ONETOC2 = self::ONE_NOTE;

    public const ORDEREDTEST = self::APPLICATION_XML;

    public const OSDX = "application/opensearchdescription+xml";

    public const P10 = "application/pkcs10";

    public const P12 = "application/x-pkcs12";

    public const P7B = "application/x-pkcs7-certificates";

    public const P7C = "application/pkcs7-mime";

    public const P7M = "application/pkcs7-mime";

    public const P7R = "application/x-pkcs7-certreqresp";

    public const P7S = "application/pkcs7-signature";

    public const PBM = "image/x-portable-bitmap";

    public const PCAST = "application/x-podcast";

    public const PCT = self::IMG_PICT;

    public const PCX = self::OCTET_STREAM;

    public const PCZ = self::OCTET_STREAM;

    public const PDF = "application/pdf";

    public const PFB = self::OCTET_STREAM;

    public const PFM = self::OCTET_STREAM;

    public const PFX = "application/x-pkcs12";

    public const PGM = "image/x-portable-graymap";

    public const PIC = self::IMG_PICT;

    public const PICT = self::IMG_PICT;

    public const PKGDEF = self::TEXT_PLAIN;

    public const PKGUNDEF = self::TEXT_PLAIN;

    public const PKO = "application/vnd.ms-pki.pko";

    public const PLS = "audio/scpls";

    public const PMA = self::PERFMON;

    public const PMC = self::PERFMON;

    public const PML = self::PERFMON;

    public const PMR = self::PERFMON;

    public const PMW = self::PERFMON;

    public const PNG = "image/png";

    public const PNM = "image/x-portable-anymap";

    public const PNT = self::MAC_PAINT;

    public const PNTG = self::MAC_PAINT;

    public const PNZ = "image/png";

    public const POT = self::POWERPOINT;

    public const POTM = self::POWERPOINT . ".template.macroEnabled.12";

    public const POTX = "application/vnd.openxmlformats-officedocument.presentationml.template";

    public const PPA = self::POWERPOINT;

    public const PPAM = self::POWERPOINT . ".addin.macroEnabled.12";

    public const PPM = "image/x-portable-pixmap";

    public const PPS = self::POWERPOINT;

    public const PPSM = self::POWERPOINT . ".slideshow.macroEnabled.12";

    public const PPSX = "application/vnd.openxmlformats-officedocument.presentationml.slideshow";

    public const PPT = self::POWERPOINT;

    public const PPTM = self::POWERPOINT . ".presentation.macroEnabled.12";

    public const PPTX = "application/vnd.openxmlformats-officedocument.presentationml.presentation";

    public const PRF = "application/pics-rules";

    public const PRM = self::OCTET_STREAM;

    public const PRX = self::OCTET_STREAM;

    public const PS = self::POST_SCRIPT;

    public const PSC1 = "application/PowerShell";

    public const PSD = self::OCTET_STREAM;

    public const PSESS = self::APPLICATION_XML;

    public const PSM = self::OCTET_STREAM;

    public const PSP = self::OCTET_STREAM;

    public const PUB = "application/x-mspublisher";

    public const PWZ = self::POWERPOINT;

    public const QHT = "text/x-html-insertion";

    public const QHTM = "text/x-html-insertion";

    public const QT = self::VID_QUICKTIME;

    public const QTI = "image/x-quicktime";

    public const QTIF = "image/x-quicktime";

    public const QTL = "application/x-quicktimeplayer";

    public const QXD = self::OCTET_STREAM;

    public const RA = "audio/x-pn-realaudio";

    public const RAM = "audio/x-pn-realaudio";

    public const RAR = self::OCTET_STREAM;

    public const RAS = "image/x-cmu-raster";

    public const RAT = "application/rat-file";

    public const RC = self::TEXT_PLAIN;

    public const RC2 = self::TEXT_PLAIN;

    public const RCT = self::TEXT_PLAIN;

    public const RDLC = self::APPLICATION_XML;

    public const RESX = self::APPLICATION_XML;

    public const RF = "image/vnd.rn-realflash";

    public const RGB = "image/x-rgb";

    public const RGS = self::TEXT_PLAIN;

    public const RM = "application/vnd.rn-realmedia";

    public const RMI = self::AUD_MID;

    public const RMP = "application/vnd.rn-rn_music_package";

    public const ROFF = self::TROFF;

    public const RPM = "audio/x-pn-realaudio-plugin";

    public const RQY = "text/x-ms-rqy";

    public const RTF = "application/rtf";

    public const RTX = "text/richtext";

    public const RULESET = self::APPLICATION_XML;

    public const S = self::TEXT_PLAIN;

    public const SAFARIEXTZ = "application/x-safari-safariextz";

    public const SCD = "application/x-msschedule";

    public const SCT = "text/scriptlet";

    public const SD2 = "audio/x-sd2";

    public const SDP = "application/sdp";

    public const SEA = self::OCTET_STREAM;

    public const SEARCHCONNECTOR_MS = "application/windows-search-connector+xml";

    public const SETPAY = "application/set-payment-initiation";

    public const SETREG = "application/set-registration-initiation";

    public const SETTINGS = self::APPLICATION_XML;

    public const SGIMB = "application/x-sgimb";

    public const SGML = "text/sgml";

    public const SH = "application/x-sh";

    public const SHAR = "application/x-shar";

    public const SHTML = self::TEXT_HTML;

    public const SIT = "application/x-stuffit";

    public const SITEMAP = self::APPLICATION_XML;

    public const SKIN = self::APPLICATION_XML;

    public const SLDM = self::POWERPOINT . ".slide.macroEnabled.12";

    public const SLDX = "application/vnd.openxmlformats-officedocument.presentationml.slide";

    public const SLK = self::EXCEL;

    public const SLN = self::TEXT_PLAIN;

    public const SLUPKG_MS = "application/x-ms-license";

    public const SMD = self::AUD_SMD;

    public const SMI = self::OCTET_STREAM;

    public const SMX = self::AUD_SMD;

    public const SMZ = self::AUD_SMD;

    public const SND = "audio/basic";

    public const SNIPPET = self::APPLICATION_XML;

    public const SNP = self::OCTET_STREAM;

    public const SOL = self::TEXT_PLAIN;

    public const SOR = self::TEXT_PLAIN;

    public const SPC = "application/x-pkcs7-certificates";

    public const SPL = "application/futuresplash";

    public const SRC = "application/x-wais-source";

    public const SRF = self::TEXT_PLAIN;

    public const SSISDEPLOYMENTMANIFEST = self::TEXT_XML;

    public const SSM = "application/streamingmedia";

    public const SST = "application/vnd.ms-pki.certstore";

    public const STL = "application/vnd.ms-pki.stl";

    public const SV4CPIO = "application/x-sv4cpio";

    public const SV4CRC = "application/x-sv4crc";

    public const SVC = self::APPLICATION_XML;

    public const SWF = "application/x-shockwave-flash";

    public const T = self::TROFF;

    public const TAR = "application/x-tar";

    public const TCL = "application/x-tcl";

    public const TESTRUNCONFIG = self::APPLICATION_XML;

    public const TESTSETTINGS = self::APPLICATION_XML;

    public const TEX = "application/x-tex";

    public const TEXI = "application/x-texinfo";

    public const TEXINFO = "application/x-texinfo";

    public const TGZ = "application/x-compressed";

    public const THMX = "application/vnd.ms-officetheme";

    public const THN = self::OCTET_STREAM;

    public const TIF = "image/tiff";

    public const TIFF = "image/tiff";

    public const TLH = self::TEXT_PLAIN;

    public const TLI = self::TEXT_PLAIN;

    public const TOC = self::OCTET_STREAM;

    public const TR = self::TROFF;

    public const TRM = "application/x-msterminal";

    public const TRX = self::APPLICATION_XML;

    public const TS = self::VID_MPG_TTS;

    public const TSV = "text/tab-separated-values";

    public const TTF = self::OCTET_STREAM;

    public const TTS = self::VID_MPG_TTS;

    public const TXT = self::TEXT_PLAIN;

    public const U32 = self::OCTET_STREAM;

    public const ULS = "text/iuls";

    public const USER = self::TEXT_PLAIN;

    public const USTAR = "application/x-ustar";

    public const V3G2 = "video/3gpp2";

    public const V3GP = "video/3gpp";

    public const V3GP2 = "video/3gpp2";

    public const V3GPP = "video/3gpp";

    public const VB = self::TEXT_PLAIN;

    public const VBDPROJ = self::TEXT_PLAIN;

    public const VBK = self::VID_MPG;

    public const VBPROJ = self::TEXT_PLAIN;

    public const VBS = "text/vbscript";

    public const VCF = "text/x-vcard";

    public const VCPROJ = self::APPLICATION_XML;

    public const VCS = self::TEXT_PLAIN;

    public const VCXPROJ = self::APPLICATION_XML;

    public const VDDPROJ = self::TEXT_PLAIN;

    public const VDP = self::TEXT_PLAIN;

    public const VDPROJ = self::TEXT_PLAIN;

    public const VDX = "application/vnd.ms-visio.viewer";

    public const VML = self::TEXT_XML;

    public const VSCONTENT = self::APPLICATION_XML;

    public const VSCT = self::TEXT_XML;

    public const VSD = self::VISIO;

    public const VSI = "application/ms-vsi";

    public const VSIX = "application/vsix";

    public const VSIXLANGPACK = self::TEXT_XML;

    public const VSIXMANIFEST = self::TEXT_XML;

    public const VSMDI = self::APPLICATION_XML;

    public const VSPSCC = self::TEXT_PLAIN;

    public const VSS = self::VISIO;

    public const VSSCC = self::TEXT_PLAIN;

    public const VSSETTINGS = self::TEXT_XML;

    public const VSSSCC = self::TEXT_PLAIN;

    public const VST = self::VISIO;

    public const VSTEMPLATE = self::TEXT_XML;

    public const VSTO = "application/x-ms-vsto";

    public const VSW = self::VISIO;

    public const VSX = self::VISIO;

    public const VTX = self::VISIO;

    public const WAV = "audio/wav";

    public const WAVE = "audio/wav";

    public const WAX = "audio/x-ms-wax";

    public const WBK = self::WORD;

    public const WBMP = "image/vnd.wap.wbmp";

    public const WCM = self::WORKS;

    public const WDB = self::WORKS;

    public const WDP = "image/vnd.ms-photo";

    public const WEBARCHIVE = "application/x-safari-webarchive";

    public const WEBTEST = self::APPLICATION_XML;

    public const WIQ = self::APPLICATION_XML;

    public const WIZ = self::WORD;

    public const WKS = self::WORKS;

    public const WLMP = "application/wlmoviemaker";

    public const WLPGINSTALL = "application/x-wlpg-detect";

    public const WLPGINSTALL3 = "application/x-wlpg3-detect";

    public const WM = "video/x-ms-wm";

    public const WMA = "audio/x-ms-wma";

    public const WMD = "application/x-ms-wmd";

    public const WMF = "application/x-msmetafile";

    public const WML = "text/vnd.wap.wml";

    public const WMLC = "application/vnd.wap.wmlc";

    public const WMLS = "text/vnd.wap.wmlscript";

    public const WMLSC = "application/vnd.wap.wmlscriptc";

    public const WMP = "video/x-ms-wmp";

    public const WMV = "video/x-ms-wmv";

    public const WMX = "video/x-ms-wmx";

    public const WMZ = "application/x-ms-wmz";

    public const WPL = "application/vnd.ms-wpl";

    public const WPS = self::WORKS;

    public const WRI = "application/x-mswrite";

    public const WRL = self::VRLM;

    public const WRZ = self::VRLM;

    public const WSC = "text/scriptlet";

    public const WSDL = self::TEXT_XML;

    public const WVX = "video/x-ms-wvx";

    public const X = "application/directx";

    public const XAF = self::VRLM;

    public const XAML = "application/xaml+xml";

    public const XAP = "application/x-silverlight-app";

    public const XBAP = "application/x-ms-xbap";

    public const XBM = "image/x-xbitmap";

    public const XDR = self::TEXT_PLAIN;

    public const XHT = "application/xhtml+xml";

    public const XHTML = "application/xhtml+xml";

    public const X7Z = "application/x-7z-compressed";

    public const XLA = self::EXCEL;

    public const XLAM = "application/vnd.ms-excel.addin.macroEnabled.12";

    public const XLC = self::EXCEL;

    public const XLD = self::EXCEL;

    public const XLK = self::EXCEL;

    public const XLL = self::EXCEL;

    public const XLM = self::EXCEL;

    public const XLS = self::EXCEL;

    public const XLSB = "application/vnd.ms-excel.sheet.binary.macroEnabled.12";

    public const XLSM = "application/vnd.ms-excel.sheet.macroEnabled.12";

    public const XLSX = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";

    public const XLT = self::EXCEL;

    public const XLTM = "application/vnd.ms-excel.template.macroEnabled.12";

    public const XLTX = "application/vnd.openxmlformats-officedocument.spreadsheetml.template";

    public const XLW = self::EXCEL;

    public const XML = self::TEXT_XML;

    public const XMTA = self::APPLICATION_XML;

    public const XOF = self::VRLM;

    public const XOML = self::TEXT_PLAIN;

    public const XPM = "image/x-xpixmap";

    public const XPS = "application/vnd.ms-xpsdocument";

    public const XRM_MS = self::TEXT_XML;

    public const XSC = self::APPLICATION_XML;

    public const XSD = self::TEXT_XML;

    public const XSF = self::TEXT_XML;

    public const XSL = self::TEXT_XML;

    public const XSLT = self::TEXT_XML;

    public const XSN = self::OCTET_STREAM;

    public const XSS = self::APPLICATION_XML;

    public const XTP = self::OCTET_STREAM;

    public const XWD = "image/x-xwindowdump";

    public const Z = "application/x-compress";

    public const ZIP = "application/x-zip-compressed";
}
