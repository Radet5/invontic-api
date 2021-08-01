defmodule InvonticApiWeb.UserView do
  use InvonticApiWeb, :view

  alias InvonticApi.Accounts

  def first_name(%Accounts.User{name: name}) do
    name
    |> String.split(" ")
    |> Enum.at(0)
  end
end
