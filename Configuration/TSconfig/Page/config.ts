RTE.classes {
    clojure.name = Clojure
    cpp.name = C/C++
    cs.name = C#
    css.name = CSS
    d.name = D
    dart.name = Dart
    go.name = Go
    gradle.name = Gradle
    groovy.name = Groovy
    java.name = Java
    javascript.name = Javascript
    json.name = JSON
    markdown.name = Markdown
    objectivec.name = Objective-C
    perl.name = Perl
    php.name = PHP
    python.name = Python
    ruby.name = Ruby
    sql.name = SQL
    xml.name = HTML / XML
    accesslog.name = Access Log
    apache.name = Apache Server Configuration
    applescript.name = AppleScript
    arduino.name = Arduino
    armasm.name = Assembler (ARM)
    asciidoc.name = AsciiDoc
    aspectj.name = AspectJ
    autohotkey.name = AutoHotkey
    avrasm.name = Assembler (AVR)
    axapta.name = Axapta
    bash.name = Bash
    basic.name = Basic
    brainfuck.name = Brainfuck
    cal.name = C/AL
    capnproto.name = Cap'n Proto
    ceylon.name = Ceylon
    clojure-repl.name = Clojure REPL
    cmake.name = CMake
    coffeescript.name = CoffeeScript
    cos.name = Caché Object Script
    crmsh.name = CRM Shell
    crystal.name = Crystal
    csp.name = CSP
    delphi.name = Delphi
    diff.name = Diff
    django.name = Django
    dns.name = DNS Zone File
    dockerfile.name = Dockerfile
    dos.name = Batch Script
    dts.name = Device Tree
    dust.name = Dust
    elixir.name = Elixir
    elm.name = Elm
    erb.name = Embedded Ruby
    erlang.name = Erlang
    erlang-repl.name = Erlang REPL
    fix.name = FIX
    fortran.name = Fortran
    fsharp.name = F#
    gams.name = GAMS
    gauss.name = GAUSS
    gcode.name = G-code (ISO 6983)
    gherkin.name = Gherkin
    glsl.name = GLSL
    golo.name = Golo
    haml.name = Haml
    handlebars.name = Handlebars
    haskell.name = Haskell
    haxe.name = Haxe
    hsp.name = HSP
    htmlbars.name = HTMLBars
    http.name = HTTP
    inform7.name = Inform 7
    ini.name = INI File Format
    irpf90.name = IRPF90
    julia.name = Julia
    kotlin.name = Kotlin
    lasso.name = LassoScript
    less.name = Less Preprocessor
    lisp.name = Lisp
    livecodeserver.name = LiveCode
    livescript.name = LiveScript
    lua.name = Lua
    makefile.name = Makefile
    mathematica.name = Mathematica
    matlab.name = Matlab
    maxima.name = Maxima
    mel.name = MEL
    mercury.name = Mercury
    mipsarm.name = Assembler (MIPS)
    mizar.name = Mizar
    mojolicious.name = Mojolicious
    monkey.name = Monkey
    nginx.name = Nginx Server Configuration
    nimrod.name = Nimrod
    nix.name = Nix
    nsis.name = NSIS
    ocaml.name = OCaml
    openscad.name = OpenSCAD
    oxygene.name = Oxygene
    parser3.name = Parser3
    pf.name = Packet Filter Configuration
    powershell.name = Powershell Script
    processingjs.name = Processing (Java)
    profile.name = Python Profile
    prolog.name = Prolog
    protobuf.name = Google Protocol Buffer
    puppet.name = Puppet Configuration
    q.name = Q
    qml.name = Qt Markup Language (QML)
    r.name = R
    rib.name = Renderman (RIB)
    roboconf.name = RoboConf Configuration
    rsl.name = Renderman (RSL)
    ruleslanguage.name = Oracle Rules Language
    rust.name = Rust
    scala.name = Scala
    scheme.name = Scheme
    scilab.name = SciLab
    scss.name = SCSS Preprocessor
    smali.name = Smali
    smalltalk.name = SmallTalk
    sml.name = SML
    sqf.name = SQF
    stan.name = Stan
    stata.name = Stata
    step21.name = STEP Part 21
    stylus.name = Stylus Preprocessor
    swift.name = Swift
    tcl.name = TCL
    tex.name = LaTeX
    thrift.name = Thrift
    tp.name = TP
    twig.name = Twig
    typescript.name = TypeScript
    vala.name = Vala
    vbnet.name = Visual Basic .NET
    vbscript.name = Visual Basic Script
    vbscript-html.name = Visual Basic Script (HTML)
    verilog.name = VeriLog
    vhdl.name = VHDL
    vim.name = Vim
    x86asm.name = Assembler (Intel x86)
    xl.name = XL
    xquery.name = XQuery
    yaml.name = YAML Ain't Markup Language
    zephir.name = Zephir
}

RTE.default {
    contentCSS {
        languages = EXT:jm_highlightjs/Resources/Private/CSS/languages.css
    }
	proc {
		denyTags := removeFromList(pre)
		allowTags := addToList(pre)
		entryHTMLparser_db {
			denyTags := removeFromList(pre)
			allowTags := addToList(pre)
			htmlSpecialChars = 0
		}
		exitHTMLparser_db {
			htmlSpecialChars = 0
		}
	}
    buttons {
        formatblock {
			removeItems := removeFromList(pre)
        	addItems := addToList(pre)
   		}
        blockstyle {
            showTagFreeClasses = 0
        }
    }
}
