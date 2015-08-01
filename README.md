# cf-grunt-init

> Create a Caldera Forms add-on plugin with [grunt-init][].

[grunt-init]: http://gruntjs.com/project-scaffolding

## Installation
If you haven't already done so, install [grunt-init][].

Once grunt-init is installed, place this template in your `~/.grunt-init/` directory. It's recommended that you use git to clone this template into that directory, as follows:

### Clone

```
git clone https://github.com/CalderaWP/grunt-init-cf-addon
```


## Usage

At the command-line, cd into an empty directory, run this command and follow the prompts.

```
grunt-init cf-addon
```

_Note that this template will generate files in the current directory, so be sure to change to a new directory first if you don't want to overwrite existing files._

Install the NPM modules required to actually process your newly-created project by running:

```
npm install
```

## After Install Do What Josh Didn't Figure Out How To Automate
* Add a repo argument to package.json

```
"repository": {
    "type": "git",
    "url": "https://bitbucket.org/calderadev/cf-whatever/"
  },
```

* Run `composer update`
