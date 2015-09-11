module.exports = (grunt) ->
  require("load-grunt-tasks")(grunt)

  myConfig =
    pkg:
      grunt.file.readJSON "package.json"
    dir:
      src:    "src"
      dist:   "../webroot"
      sass:   "scss"
      css:    "css"

  # ===== Config ===== #
  grunt.initConfig
    # Package
    pkg: myConfig.pkg

    # Directory
    dir: myConfig.dir

    # Compass
    compass:
      dist:
        options:
          config: "config.rb"

    # Livereload
    connect:
      livereload:
        options:
          port: 8080
          hostname: "localhost"
          base: "<%= dir.dist %>/"

    # Watch Files
    watch:
      options:
        livereload: true
      css:
        files: "<%= dir.src %>/<%= dir.cass %>/**/*.scss"
        tasks: ["compass"]

    # Clean Directory
    clean:
      dist: ["<%= dir.dist %>/*"]


  # Plugin
  for npmTask in myConfig.pkg.devDependencies
    if npmTask.substring(0, 6) == "grunt-"
      grunt.loadNpmTasks(npmTask)

  # Tasks
  grunt.registerTask "default", ["connect", "watch"]
  grunt.registerTask "build", ["compass"]
  grunt.registerTask "cleanup", ["clean"]
