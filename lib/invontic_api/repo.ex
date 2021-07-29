defmodule InvonticApi.Repo do
  use Ecto.Repo,
    otp_app: :invontic_api,
    adapter: Ecto.Adapters.MyXQL
end
