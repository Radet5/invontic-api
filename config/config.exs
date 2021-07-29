# This file is responsible for configuring your application
# and its dependencies with the aid of the Mix.Config module.
#
# This configuration file is loaded before any dependency and
# is restricted to this project.

# General application configuration
use Mix.Config

config :invontic_api,
  ecto_repos: [InvonticApi.Repo]

# Configures the endpoint
config :invontic_api, InvonticApiWeb.Endpoint,
  url: [host: "localhost"],
  secret_key_base: "P2DzOIb0cSC1eXowk2wKFcUw6RNf/RhXXDsIK14N8MnFHp/EuDNxVMszBGFz5ClN",
  render_errors: [view: InvonticApiWeb.ErrorView, accepts: ~w(html json), layout: false],
  pubsub_server: InvonticApi.PubSub,
  live_view: [signing_salt: "lOaHZR+L"]

# Configures Elixir's Logger
config :logger, :console,
  format: "$time $metadata[$level] $message\n",
  metadata: [:request_id]

# Use Jason for JSON parsing in Phoenix
config :phoenix, :json_library, Jason

# Import environment specific config. This must remain at the bottom
# of this file so it overrides the configuration defined above.
import_config "#{Mix.env()}.exs"
