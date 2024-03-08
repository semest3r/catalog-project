import { isEmpty, omitBy } from "lodash";

const BASE_URL = "http://localhost:8000/api";

export const getProductsAPI = async (group_category, params) => {
  const response = await fetch(
    `${BASE_URL}/products/${group_category}?` +
      new URLSearchParams(omitBy(params, isEmpty)),
    {
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      credentials: "include",
      method: "GET",
    }
  );
  return response;
};

export const getCategoriesAPI = async (group_category) => {
  const response = await fetch(`${BASE_URL}/categories/${group_category}`, {
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    credentials: "include",
    method: "GET",
  });
  return response;
};

export const getExclusiveProductsAPI = async () => {
  const response = await fetch(`${BASE_URL}/exclusive-products`, {
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    credentials: "include",
    method: "GET",
  });
  return response;
};

export const createSubscriberAPI = async (data) => {
  const response = await fetch(`${BASE_URL}/subscriber/create`, {
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    credentials: "include",
    method: "POST",
  });
  return response;
};

export const getAllProductsAPI = async (params) => {
  const response = await fetch(`${BASE_URL}/products-all`, {
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
      },
      credentials: "include",
      method: "GET",
    }
  );
  return response;
};
