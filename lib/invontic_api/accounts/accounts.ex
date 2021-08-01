defmodule InvonticApi.Accounts do
 @moduledoc """
 The Accounts Context
 """

 alias InvonticApi.Accounts.User

 def list_users do
  [
    %User{id: "1", name: "Jose", username: "josevalim"},
    %User{id: "2", name: "Bruce", username: "redrapids"},
    %User{id: "3", name: "John", username: "johnnybravo"},
    %User{id: "4", name: "Mike", username: "mikemike"},
    %User{id: "5", name: "Sally", username: "sallysally"},
    %User{id: "6", name: "Jane", username: "janejane"},
  ]
 end

 def get_user(id) do
  Enum.find(list_users(), fn map -> map.id == id end)
 end

 def get_user_by(params) do
  Enum.find(list_users(), fn map ->
    Enum.all?(params, fn {key, value} -> Map.get(map, key) == value end)
  end)
 end
end
