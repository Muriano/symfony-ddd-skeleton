dependencies := bin/console config src apps/web/public/index.php
version := $(shell git describe --tags --dirty --always)
current-dir := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

all: help

help: ## Prints this help.
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'
